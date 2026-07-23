<?php

namespace App\Http\Controllers;

use App\Services\CorrectedAgeCalculator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewbornController extends Controller
{
    /**
     * Muestra el formulario para registrar al bebé (paso 2 del registro).
     */
    public function create(): View
    {
        return view('register-baby');
    }

    /**
     * Guarda los datos del bebé recién registrados.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validated($request);

        $request->user()->newborn()->create($validated);

        return redirect()->route('dashboard');
    }

    /**
     * Muestra el formulario para editar al bebé ya registrado.
     */
    public function edit(Request $request, CorrectedAgeCalculator $calculator): View|RedirectResponse
    {
        $newborn = $request->user()->newborn;

        if (! $newborn) {
            return redirect()->route('baby.create');
        }

        return view('edit-baby', [
            'newborn' => $newborn,
            'ageSummary' => $calculator->summary($newborn),
        ]);
    }

    /**
     * Actualiza los datos del bebé.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $this->validated($request);

        $request->user()->newborn()->update($validated);

        return redirect()->route('profile.index');
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date', 'after_or_equal:'.now()->subYear()->toDateString(), 'before_or_equal:today'],
            'gestational_weeks' => ['required', 'integer', 'between:22,42'],
            'apgar_minute_1' => ['nullable', 'integer', 'between:0,10'],
            'apgar_minute_5' => ['nullable', 'integer', 'between:0,10'],
        ]);
    }
}
