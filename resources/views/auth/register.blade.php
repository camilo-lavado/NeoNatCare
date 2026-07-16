<x-layout page="register" title="Crear cuenta — CuidarIA">
    <x-slot:topbar>
        <x-topbar title="Crear cuenta" :back="route('home')" />
    </x-slot:topbar>

    <div class="text-center">
        <h1 class="font-heading font-bold text-2xl leading-[1.2] text-ink">Empecemos</h1>
        <p class="text-base leading-[1.5] text-ink-2 mt-[6px]">Crea tu cuenta para acompañar a tu bebé y registrar tu propio bienestar.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-4">
        @csrf

        <x-field label="Nombre" :error="$errors->first('name')">
            <span class="ms">person</span>
            <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Valentina" required autofocus autocomplete="given-name">
        </x-field>
        <p class="text-xs text-ink-2 -mt-3">Solo tu primer nombre — no pedimos apellidos, para minimizar los datos que tratamos (Ley 21.719).</p>

        {{-- TODO(CuidarIA): el rol de cuidador es solo visual por ahora — no hay columna en `users`
             ni relación con el bebé todavía. Se sigue capturando vía sessionStorage (ver resources/js/cuidaria.js),
             igual que en el mockup. Ver docs/ARCHITECTURE.md (nota sobre DynamicContextController y rol del cuidador). --}}
        <div class="flex flex-col gap-[7px]">
            <label class="text-[13px] font-bold text-ink">¿Cuál es tu rol?</label>
            <div class="flex gap-2 flex-wrap" data-chip-group>
                <button type="button" class="chip-option px-[15px] py-[11px] rounded-full border-[1.5px] font-bold text-[13.5px] border-menta bg-menta-100 text-menta-600" data-role="madre">Madre</button>
                <button type="button" class="chip-option px-[15px] py-[11px] rounded-full border-[1.5px] font-bold text-[13.5px] border-celeste-border bg-card text-ink-2" data-role="padre">Padre</button>
                <button type="button" class="chip-option px-[15px] py-[11px] rounded-full border-[1.5px] font-bold text-[13.5px] border-celeste-border bg-card text-ink-2" data-role="otro">Otro cuidador</button>
            </div>
            <p class="text-xs text-ink-2 -mt-[3px]">Usamos esto solo para adaptar el copy de la app a tu rol — la orientación clínica del bebé es la misma para todos.</p>
        </div>

        <x-field label="Correo" :error="$errors->first('email')">
            <span class="ms">mail</span>
            <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="tucorreo@ejemplo.cl" required autocomplete="username">
        </x-field>

        <x-field label="Contraseña" :error="$errors->first('password')">
            <span class="ms">lock</span>
            <input id="password" name="password" data-password-input type="password" placeholder="Mínimo 8 caracteres" required minlength="8" autocomplete="new-password">
            <button type="button" data-password-toggle class="ms" aria-label="Mostrar contraseña">visibility</button>
        </x-field>

        <x-field label="Confirmar contraseña">
            <span class="ms">lock</span>
            <input id="password_confirmation" name="password_confirmation" data-password-input type="password" placeholder="Repite tu contraseña" required minlength="8" autocomplete="new-password">
            <button type="button" data-password-toggle class="ms" aria-label="Mostrar contraseña">visibility</button>
        </x-field>

        {{-- TODO(CuidarIA): estos dos consentimientos (términos generales + datos sensibles Ley 21.719)
             todavía no se auditan en base de datos (falta modelo/tabla de auditoría de consentimiento).
             Por ahora solo bloquean el envío del formulario vía `required` nativo. --}}
        <label class="flex items-start gap-[10px] text-[13px] leading-[1.5] text-ink-2">
            <x-checkbox name="terms_accepted" required />
            <span class="flex-1">Acepto los <a href="{{ route('legal.terms') }}" class="text-celeste font-bold">Términos y condiciones</a> y la <a href="{{ route('legal.privacy') }}" class="text-celeste font-bold">Política de privacidad</a>.</span>
        </label>

        <label class="flex items-start gap-[10px] text-[13px] leading-[1.5] text-ink-2 bg-celeste-tint rounded-2xl px-[14px] py-3">
            <x-checkbox name="sensitive_data_consent" required />
            <span class="flex-1">Autorizo de forma <b>explícita y específica</b> el tratamiento de los datos de salud de mi bebé y de mi propio bienestar emocional (dato sensible, Ley 21.719), para recibir orientación clínica y contención personalizada. Puedo retirar esta autorización cuando quiera.</span>
        </label>

        <x-btn type="submit" variant="primary">Crear cuenta</x-btn>
    </form>

    <x-btn variant="link" href="{{ route('login') }}">Ya tengo cuenta · Ingresar</x-btn>
</x-layout>
