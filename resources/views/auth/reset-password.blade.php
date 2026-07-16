<x-layout page="reset-password" title="Elegir nueva contraseña — CuidarIA">
    <x-slot:topbar>
        <x-topbar title="Elegir nueva contraseña" :back="route('login')" />
    </x-slot:topbar>

    <form method="POST" action="{{ route('password.store') }}" class="flex flex-col gap-4">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <x-field label="Correo" :error="$errors->first('email')">
            <span class="ms">mail</span>
            <input id="email" name="email" type="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
        </x-field>

        <x-field label="Nueva contraseña" :error="$errors->first('password')">
            <span class="ms">lock</span>
            <input id="password" name="password" data-password-input type="password" required autocomplete="new-password">
            <button type="button" data-password-toggle class="ms" aria-label="Mostrar contraseña">visibility</button>
        </x-field>

        <x-field label="Confirmar contraseña">
            <span class="ms">lock</span>
            <input id="password_confirmation" name="password_confirmation" data-password-input type="password" required autocomplete="new-password">
            <button type="button" data-password-toggle class="ms" aria-label="Mostrar contraseña">visibility</button>
        </x-field>

        <x-btn type="submit" variant="primary">Guardar nueva contraseña</x-btn>
    </form>
</x-layout>
