<?php

namespace App\Services;

use App\Models\Screening;
use Illuminate\Support\Collection;

/**
 * Calcula el resultado de la Escala de Depresión Posparto de Edimburgo (EPDS).
 *
 * Puntos de corte alineados a MINSAL (posparto): 0-9 Leve, 10-12 Leve-moderado,
 * 13+ Alto. Independiente del puntaje total, cualquier respuesta > 0 en la
 * pregunta 10 (ideación de autolesión) activa una alerta que se trata por
 * separado — es una regla clínica estándar de la EPDS, no una preferencia de
 * producto. Ver guias-clinicas/salud-mental.md y docs/RAG-FUENTES.md.
 */
class EpdsScorer
{
    public const ITEM_COUNT = 10;

    /**
     * @param  array<int, int>  $answers  10 valores de 0 a 3, en el orden oficial de la escala.
     * @return array{total: int, level: string, item10_alert: bool}
     */
    public function score(array $answers): array
    {
        $total = array_sum($answers);
        $item10 = $answers[self::ITEM_COUNT - 1] ?? 0;

        return [
            'total' => $total,
            'level' => $this->levelFor($total),
            'item10_alert' => $item10 > 0,
        ];
    }

    public function levelFor(int $total): string
    {
        return match (true) {
            $total >= 13 => 'Alto',
            $total >= 10 => 'Leve-moderado',
            default => 'Leve',
        };
    }

    public function copyFor(string $level): string
    {
        return match ($level) {
            'Alto' => 'Tu puntaje sugiere que vale la pena conversar esto pronto con un profesional de salud — no es un diagnóstico, pero sí una señal a tomar en serio.',
            'Leve-moderado' => 'Es normal sentir más carga en esta etapa. Aquí van algunas ideas de apoyo que pueden ayudarte esta semana.',
            default => 'Tu resultado no muestra señales de alarma por ahora. Igual puedes seguir usando la bitácora emocional cuando lo necesites.',
        };
    }

    /**
     * Arma las barras de "Tu historial" a partir de los tamizajes previos del usuario, más recientes al final.
     *
     * @param  Collection<int, Screening>  $screenings  ordenados de más antiguo a más reciente.
     * @return array<int, array{height: int, label: string, variant: string, active?: bool}>
     */
    public function toChartBars(Collection $screenings): array
    {
        $bars = $screenings->map(fn ($screening) => [
            'height' => max(10, min(90, (int) round($screening->total_score * 3))),
            'label' => $screening->created_at->format('d/m'),
            'variant' => $screening->total_score >= 10 ? 'warn' : 'default',
        ])->values()->all();

        if ($bars !== []) {
            $lastIndex = array_key_last($bars);
            $bars[$lastIndex]['active'] = true;
        }

        return $bars;
    }
}
