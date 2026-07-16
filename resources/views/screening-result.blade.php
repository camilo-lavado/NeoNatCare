<x-layout page="screening-result" title="Resultado del tamizaje — CuidarIA">
    <h1 class="font-heading font-bold text-[21px] leading-[1.2] text-ink m-0">Gracias por completarlo</h1>

    <div class="rounded-[26px] p-[22px] text-center bg-amber-bg">
        <div class="text-[13px] font-bold tracking-[.03em]" style="color:#9C6A1E">NIVEL ACTUAL</div>
        <div class="font-heading font-bold text-[28px] leading-[1.2] mt-[6px]" style="color:#7A5115" data-screening-level>Leve–moderado</div>
        <div class="text-[14.5px] leading-[1.5] mt-2" style="color:#7A5115">Es normal sentir más carga en esta etapa. Aquí van algunas ideas de apoyo que pueden ayudarte esta semana.</div>
    </div>

    <div>
        <div class="text-[13px] font-bold text-ink mb-[10px]">Tu historial</div>
        <x-bar-chart :height="110" :bars="[
            ['height' => 38, 'label' => 'Sem 1'],
            ['height' => 58, 'label' => 'Sem 2', 'variant' => 'warn'],
            ['height' => 70, 'label' => 'Sem 3', 'variant' => 'warn', 'active' => true],
        ]" />
    </div>

    <x-alert variant="sec" icon="info">
        Esto es un apoyo, no un diagnóstico clínico.
    </x-alert>

    <x-btn variant="primary" href="{{ route('wellbeing') }}" class="mt-auto">
        <span class="ms text-[19px]">favorite</span>Ver ideas de apoyo
    </x-btn>

    @push('scripts')
        <script>
            try {
                var level = sessionStorage.getItem('cuidaria_screening_level');
                if (level) document.querySelector('[data-screening-level]').textContent = level;
            } catch (e) { /* sessionStorage no disponible, se muestra el valor por defecto */ }
        </script>
    @endpush
</x-layout>
