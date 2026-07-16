<x-layout page="forgot-password" title="Recuperar contraseña — CuidarIA">
    <x-slot:topbar>
        <x-topbar title="Recuperar contraseña" :back="route('login')" />
    </x-slot:topbar>

    <p class="text-base leading-[1.5] text-ink-2">¿Olvidaste tu clave? No hay problema. Escribe tu correo y te enviaremos un enlace para elegir una nueva.</p>

    <x-auth-session-status class="text-sm text-menta-600" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="flex flex-col gap-4">
        @csrf

        <x-field label="Correo" :error="$errors->first('email')">
            <span class="ms">mail</span>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
        </x-field>

        <x-btn type="submit" variant="primary">Enviar enlace de recuperación</x-btn>
    </form>
</x-layout>
