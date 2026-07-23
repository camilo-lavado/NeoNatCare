<x-layout page="wellbeing" title="Tu bienestar — CuidarIA" with-nav>
    <h1 class="font-heading font-bold text-[22px] leading-[1.2] text-ink m-0">Tu bienestar</h1>

    <x-wellbeing-summary-card :metrics="[
        ['icon' => 'bedtime', 'value' => '5,4h', 'label' => 'Sueño prom.', 'color' => 'menta-600'],
        ['icon' => 'psychology', 'value' => 'Moderada', 'label' => 'Ansiedad', 'color' => 'amber'],
        ['icon' => 'sentiment_satisfied', 'value' => 'Bien', 'label' => 'Ánimo', 'color' => 'menta-600'],
    ]" />

    <a href="{{ route('screening.index') }}" class="bg-menta-100 rounded-[22px] px-4 py-[15px] flex items-center gap-[13px]">
        <span class="ms text-2xl text-menta-600">fact_check</span>
        <div class="flex-1">
            <div class="text-[15px] font-bold text-menta-600">Tamizaje breve</div>
            <div class="text-[12.5px] text-menta-600">10 preguntas · no es un diagnóstico</div>
        </div>
        <span class="ms text-xl text-menta-600">chevron_right</span>
    </a>

    <div>
        <div class="text-[13px] font-bold text-ink mb-[10px]">Ánimo esta semana</div>
        <x-bar-chart :height="130" :bars="[
            ['height' => 52, 'label' => 'L'],
            ['height' => 64, 'label' => 'M'],
            ['height' => 40, 'label' => 'M', 'variant' => 'warn'],
            ['height' => 34, 'label' => 'J', 'variant' => 'warn'],
            ['height' => 70, 'label' => 'V'],
            ['height' => 78, 'label' => 'S', 'variant' => 'peak'],
            ['height' => 82, 'label' => 'D', 'variant' => 'peak', 'active' => true],
        ]" />
    </div>

    <div class="bg-menta-100 rounded-[20px] p-4">
        <div class="flex items-center gap-3">
            <span class="ms text-[19px] text-menta-600">lightbulb</span>
            <div class="text-[13px] font-bold text-menta-600">Notamos un patrón</div>
        </div>
        <p class="text-sm leading-[1.5] text-menta-600 mt-2">Tu ánimo suele bajar los martes y miércoles en la noche. ¿Quieres programar un recordatorio para pedir ayuda esos días?</p>
    </div>

    <div>
        <div class="text-[13px] font-bold text-ink mb-[10px]">Red de apoyo</div>
        @include('partials.support-line')
    </div>
</x-layout>
