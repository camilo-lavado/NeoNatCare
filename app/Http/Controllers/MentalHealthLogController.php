<?php

namespace App\Http\Controllers;

use App\Models\MentalHealthLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class MentalHealthLogController extends Controller
{
    /**
     * Muestra el check-in diario y los últimos registros del cuidador.
     */
    public function index(Request $request): View
    {
        return view('mood-log', [
            'logs' => $request->user()->mentalHealthLogs()->latest()->take(5)->get(),
        ]);
    }

    /**
     * Guarda el check-in emocional del día.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'sleep_hours' => ['required', Rule::in(['lt4', '4-6', '6-8', '8+'])],
            'mood' => ['required', Rule::in(['exhausted', 'low', 'normal', 'good', 'energetic'])],
            'anxiety_level' => ['required', 'integer', 'between:0,100'],
            'note' => ['nullable', 'string', 'max:1000'],
        ]);

        $request->user()->mentalHealthLogs()->create($validated);

        return redirect()->route('dashboard');
    }

    /**
     * Elimina un registro propio de la bitácora emocional.
     */
    public function destroy(Request $request, MentalHealthLog $mentalHealthLog): RedirectResponse
    {
        abort_unless($mentalHealthLog->user_id === $request->user()->id, 403);

        $mentalHealthLog->delete();

        return redirect()->route('mood-log.index');
    }
}
