<?php

namespace App\Http\Controllers;

use App\Services\EpdsScorer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ScreeningController extends Controller
{
    /**
     * Muestra el wizard de tamizaje (10 preguntas, cliente-side, sin recargar página).
     */
    public function index(): View
    {
        return view('screening');
    }

    /**
     * Recibe las 10 respuestas, calcula el resultado y lo persiste.
     *
     * Si la pregunta 10 (autolesión) tiene puntaje > 0, deriva de inmediato a la
     * pantalla de urgencia — sin importar el puntaje total. Es una regla clínica
     * de la EPDS, no una decisión de este controlador (ver App\Services\EpdsScorer).
     */
    public function store(Request $request, EpdsScorer $scorer): RedirectResponse
    {
        $validated = $request->validate([
            'answers' => ['required', 'array', 'size:'.EpdsScorer::ITEM_COUNT],
            'answers.*' => ['required', 'integer', 'between:0,3'],
        ]);

        $result = $scorer->score($validated['answers']);

        $screening = $request->user()->screenings()->create([
            'total_score' => $result['total'],
            'level' => $result['level'],
            'item10_alert' => $result['item10_alert'],
        ]);

        if ($screening->item10_alert) {
            return redirect()->route('urgent.caregiver');
        }

        return redirect()->route('screening.result');
    }

    /**
     * Muestra el resultado del tamizaje más reciente del usuario, con su historial.
     */
    public function result(Request $request, EpdsScorer $scorer): View|RedirectResponse
    {
        $screening = $request->user()->screenings()->latest()->first();

        if (! $screening) {
            return redirect()->route('screening.index');
        }

        $history = $request->user()->screenings()->oldest()->take(6)->get();

        return view('screening-result', [
            'screening' => $screening,
            'copy' => $scorer->copyFor($screening->level),
            'historyBars' => $scorer->toChartBars($history),
        ]);
    }
}
