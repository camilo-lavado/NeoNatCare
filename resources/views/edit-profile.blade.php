<x-layout page="edit-profile" title="Editar mi perfil — CuidarIA">
    <x-slot:topbar>
        <x-topbar title="Editar mi perfil" :back="route('profile.index')" />
    </x-slot:topbar>

    <div class="flex justify-center">
        <div class="w-[72px] h-[72px] rounded-full flex items-center justify-center text-center text-[9px] font-mono font-semibold text-ink-2"
             style="background:repeating-linear-gradient(45deg, var(--color-celeste-accent), var(--color-celeste-accent) 8px, #fff 8px, #fff 16px)">
            foto
        </div>
    </div>
    <a href="#" class="block text-center font-bold text-[15px] text-celeste -mt-[10px]">Cambiar foto</a>

    @if (session('status') === 'profile-updated')
        <p class="text-center text-sm text-menta-600">Tus datos se guardaron.</p>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" class="flex flex-col gap-4">
        @csrf
        @method('patch')

        <x-field label="Nombre" :error="$errors->first('name')">
            <span class="ms">person</span>
            <input id="my-name" name="name" data-capture-name type="text" value="{{ old('name', $user->name) }}" required autocomplete="given-name">
        </x-field>
        <p class="text-xs text-ink-2 -mt-3">Solo tu primer nombre — no pedimos apellidos, para minimizar los datos que tratamos (Ley 21.719).</p>

        <x-field label="Correo" :error="$errors->first('email')">
            <span class="ms">mail</span>
            <input id="my-email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="email">
        </x-field>

        <x-btn type="submit" variant="primary">
            <span class="ms text-[19px]">check</span>Guardar cambios
        </x-btn>
    </form>

    <hr class="h-px bg-celeste-border border-none">

    @if (session('status') === 'password-updated')
        <p class="text-center text-sm text-menta-600">Tu contraseña se actualizó.</p>
    @endif

    <form method="POST" action="{{ route('password.update') }}" class="flex flex-col gap-4">
        @csrf
        @method('put')

        <div class="text-[12.5px] font-bold uppercase tracking-[.04em] text-ink-2 -mb-2">Cambiar contraseña (opcional)</div>

        <x-field label="Contraseña actual" :error="$errors->updatePassword->first('current_password')">
            <span class="ms">lock</span>
            <input id="current-password" name="current_password" data-password-input type="password" placeholder="••••••••" autocomplete="current-password">
            <button type="button" data-password-toggle class="ms" aria-label="Mostrar contraseña">visibility</button>
        </x-field>

        <x-field label="Nueva contraseña" :error="$errors->updatePassword->first('password')">
            <span class="ms">lock</span>
            <input id="new-password" name="password" data-password-input type="password" placeholder="Mínimo 8 caracteres" minlength="8" autocomplete="new-password">
            <button type="button" data-password-toggle class="ms" aria-label="Mostrar contraseña">visibility</button>
        </x-field>

        <x-field label="Confirmar nueva contraseña">
            <span class="ms">lock</span>
            <input id="new-password-confirm" name="password_confirmation" data-password-input type="password" placeholder="Repite la nueva contraseña" minlength="8" autocomplete="new-password">
            <button type="button" data-password-toggle class="ms" aria-label="Mostrar contraseña">visibility</button>
        </x-field>

        <x-btn type="submit" variant="secondary">Actualizar contraseña</x-btn>
    </form>
</x-layout>
