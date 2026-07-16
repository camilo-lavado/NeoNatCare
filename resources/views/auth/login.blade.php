<x-layout page="login" title="Ingresar — CuidarIA">
    <div class="flex flex-col items-center gap-3 mt-2">
        <span class="w-14 h-14 rounded-[18px] bg-celeste"></span>
        <div class="text-center">
            <h1 class="font-heading font-bold text-[26px] leading-[1.2] text-ink">Hola de nuevo</h1>
            <p class="text-base leading-[1.5] text-ink-2 mt-[6px]">Ingresa para seguir tu bitácora y la de tu bebé</p>
        </div>
    </div>

    <x-auth-session-status class="text-center text-sm text-menta-600" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-4 mt-[6px]">
        @csrf

        <x-field label="Correo" :error="$errors->first('email')">
            <span class="ms">mail</span>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username">
        </x-field>

        <x-field label="Contraseña" :error="$errors->first('password')">
            <span class="ms">lock</span>
            <input id="password" name="password" data-password-input type="password" required autocomplete="current-password">
            <button type="button" data-password-toggle class="ms" aria-label="Mostrar contraseña">visibility</button>
        </x-field>

        <div class="flex justify-between items-center">
            <label class="flex items-center gap-2 text-sm text-ink-2">
                <x-checkbox name="remember" />
                Recordarme
            </label>
            <a class="font-bold text-[15px] text-celeste p-0" href="{{ route('password.request') }}">¿Olvidaste tu clave?</a>
        </div>

        <x-btn type="submit" variant="primary">Ingresar</x-btn>
    </form>

    <div class="flex items-center gap-3 text-ink-2 text-[13px]">
        <span class="flex-1 h-px bg-celeste-border"></span>o<span class="flex-1 h-px bg-celeste-border"></span>
    </div>

    <x-btn variant="secondary" href="{{ route('register') }}">Crear una cuenta nueva</x-btn>
    <p class="text-center text-xs text-ink-2 mt-1">Tus datos de salud y bienestar están protegidos y cifrados</p>
</x-layout>
