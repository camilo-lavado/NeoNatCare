<x-layout page="register-baby" title="Cuéntanos de tu bebé — CuidarIA">
    <x-slot:topbar>
        <x-topbar title="Crear cuenta" :back="route('register')" />
    </x-slot:topbar>

    <div class="text-[12px] font-bold uppercase tracking-[.04em] text-celeste">Paso 2 de 2</div>
    <h1 class="font-heading font-bold text-2xl leading-[1.2] text-ink">Cuéntanos de tu bebé</h1>
    <p class="text-base leading-[1.5] text-ink-2">Con estos datos calculamos la edad corregida y adaptamos las guías clínicas a su etapa.</p>

    <form method="POST" action="{{ route('baby.store') }}" class="flex flex-col gap-4">
        @csrf

        <x-field label="Nombre del bebé" hint="Solo su primer nombre." :error="$errors->first('name')">
            <span class="ms">child_care</span>
            <input id="baby-name" name="name" type="text" value="{{ old('name') }}" placeholder="Lucas" required autocomplete="off">
        </x-field>

        <x-field label="Fecha de nacimiento" :error="$errors->first('birth_date')">
            <span class="ms">calendar_month</span>
            <input id="baby-dob" name="birth_date" type="date" value="{{ old('birth_date') }}" min="{{ now()->subYear()->toDateString() }}" max="{{ now()->toDateString() }}" required>
        </x-field>

        <x-field label="Semanas de gestación al nacer" hint="Si nació antes de las 37 semanas, usamos esto para calcular su edad corregida." :error="$errors->first('gestational_weeks')">
            <span class="ms">monitor_heart</span>
            <input id="baby-weeks" name="gestational_weeks" type="number" min="22" max="42" value="{{ old('gestational_weeks') }}" placeholder="Ej: 37" required>
        </x-field>

        <div class="flex flex-col gap-[7px]">
            <label class="text-[13px] font-bold text-ink">Puntaje Apgar <span class="font-semibold text-ink-2">(opcional)</span></label>
            <div class="flex gap-[10px] items-start">
                <div class="flex-1">
                    <div class="text-xs text-ink-2 mb-[6px]">Minuto 1</div>
                    <div class="bg-card border border-celeste-border rounded-2xl px-4 py-[15px]">
                        <input id="apgar-1" name="apgar_minute_1" type="number" min="0" max="10" value="{{ old('apgar_minute_1') }}" placeholder="0–10" inputmode="numeric" class="w-full border-none outline-none text-[15px] text-ink bg-transparent">
                    </div>
                </div>
                <div class="flex-1">
                    <div class="text-xs text-ink-2 mb-[6px]">Minuto 5</div>
                    <div class="bg-card border border-celeste-border rounded-2xl px-4 py-[15px]">
                        <input id="apgar-5" name="apgar_minute_5" type="number" min="0" max="10" value="{{ old('apgar_minute_5') }}" placeholder="0–10" inputmode="numeric" class="w-full border-none outline-none text-[15px] text-ink bg-transparent">
                    </div>
                </div>
            </div>
            <p class="text-xs text-ink-2 -mt-[3px]">Lo encuentras en el carné del niño sano. Nos da contexto sobre condiciones especiales al nacer (la prematurez ya la calculamos con las semanas de gestación).</p>
        </div>

        <x-btn type="submit" variant="primary" class="mt-auto">
            <span class="ms text-[19px]">check</span>Ir a mi dashboard
        </x-btn>
    </form>
</x-layout>
