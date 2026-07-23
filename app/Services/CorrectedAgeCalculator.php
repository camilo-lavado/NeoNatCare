<?php

namespace App\Services;

use App\Models\Newborn;
use Carbon\Carbon;

/**
 * Calcula la edad corregida de un recién nacido prematuro.
 *
 * La edad corregida es la que tendría el bebé si hubiese nacido a las 40
 * semanas de gestación: se resta a la edad cronológica la cantidad de
 * semanas que faltaron para llegar a término. Solo aplica a bebés
 * prematuros (< 37 semanas); en un bebé de término la edad corregida es
 * igual a la cronológica. Es la base con la que se adaptan las guías
 * clínicas de MINSAL/OMS a la etapa real de desarrollo del bebé, no a sus
 * días de vida literales. Ver guias-clinicas/.
 */
class CorrectedAgeCalculator
{
    public const TERM_WEEKS = 40;

    public const PRETERM_THRESHOLD_WEEKS = 37;

    public function isPreterm(Newborn $newborn): bool
    {
        return $newborn->gestational_weeks < self::PRETERM_THRESHOLD_WEEKS;
    }

    public function chronologicalAgeInDays(Newborn $newborn): int
    {
        return (int) Carbon::parse($newborn->birth_date)->diffInDays(Carbon::now());
    }

    public function correctedAgeInDays(Newborn $newborn): int
    {
        if (! $this->isPreterm($newborn)) {
            return $this->chronologicalAgeInDays($newborn);
        }

        $weeksEarly = self::TERM_WEEKS - $newborn->gestational_weeks;

        return max(0, $this->chronologicalAgeInDays($newborn) - ($weeksEarly * 7));
    }

    /**
     * Texto corto para mostrar junto al nombre del bebé (dashboard, perfil).
     */
    public function summary(Newborn $newborn): string
    {
        $days = $this->chronologicalAgeInDays($newborn);

        if (! $this->isPreterm($newborn)) {
            return "{$days} días";
        }

        return "{$days} días (edad corregida: {$this->correctedAgeInDays($newborn)} días)";
    }
}
