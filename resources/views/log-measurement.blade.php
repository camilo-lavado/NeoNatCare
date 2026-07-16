<x-layout page="log-measurement" title="Registrar controles de hoy — CuidarIA">
    <x-slot:topbar>
        <x-topbar title="Registrar controles de hoy" :back="route('dashboard')" />
    </x-slot:topbar>

    <p class="text-base leading-[1.5] text-ink-2">Registra lo que puedas hoy — no es necesario completar todo.</p>

    <form data-redirect="{{ route('dashboard') }}" class="flex flex-col gap-4">
        <x-field label="Peso de Lucas (kg)">
            <span class="ms">monitor_weight</span>
            <input id="weight" name="weight" type="number" step="0.01" min="0" placeholder="3,20" inputmode="decimal">
        </x-field>

        <x-field label="Tomas de hoy">
            <span class="ms">water_drop</span>
            <input id="feeds" name="feeds" type="number" min="0" placeholder="8">
        </x-field>

        <x-field label="Horas de sueño">
            <span class="ms">bedtime</span>
            <input id="sleep" name="sleep" type="number" step="0.5" min="0" placeholder="15">
        </x-field>

        <x-alert variant="celeste" icon="lightbulb">
            Estos datos ayudan a tu asistente a darte mejores recomendaciones y a detectar señales de alerta a tiempo.
        </x-alert>

        <x-btn type="submit" variant="primary" class="mt-auto">
            <span class="ms text-[19px]">check</span>Guardar registro
        </x-btn>
    </form>
</x-layout>
