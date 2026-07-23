<x-layout page="profile" title="Perfil — CuidarIA" with-nav>
    <h1 class="font-heading font-bold text-[23px] leading-[1.1] text-ink m-0">Perfil</h1>

    <div class="bg-celeste-tint rounded-[24px] p-5 flex items-center gap-[15px]">
        <div class="w-[60px] h-[60px] rounded-full flex items-center justify-center text-center text-[9px] font-mono font-semibold text-ink-2"
             style="background:repeating-linear-gradient(45deg, var(--color-celeste-accent), var(--color-celeste-accent) 8px, #fff 8px, #fff 16px)">
            foto
        </div>
        <div class="flex-1">
            <div class="font-heading font-bold text-[19px] leading-[1.1] text-ink">{{ auth()->user()->name }}</div>
            <div class="text-[13.5px] text-ink-2 mt-[3px]">{{ auth()->user()->email }}</div>
            @if ($newborn = auth()->user()->newborn)
                <x-chip class="mt-[7px] bg-white" data-role-chip>Madre de {{ $newborn->name }}</x-chip>
            @endif
        </div>
        <a href="{{ route('profile.edit') }}" class="ms text-xl text-celeste self-start" aria-label="Editar mi perfil">edit</a>
    </div>

    <div>
        <div class="text-[12.5px] font-bold uppercase tracking-[.04em] text-ink-2 mb-[9px]">Bebé</div>
        <div class="bg-card border border-celeste-border rounded-card overflow-hidden">
            @if ($newborn)
                @php
                    $ageCalculator = app(\App\Services\CorrectedAgeCalculator::class);
                    $babySubtitle = 'Nacido el '.$newborn->birth_date->translatedFormat('d M Y').' · '.$ageCalculator->chronologicalAgeInDays($newborn).' días';
                    if ($newborn->apgar_minute_1 || $newborn->apgar_minute_5) {
                        $babySubtitle .= ' · Apgar '.$newborn->apgar_minute_1.'/'.$newborn->apgar_minute_5;
                    }
                @endphp
                <x-list-tile icon="child_care" :title="$newborn->name" :subtitle="$babySubtitle">
                    <a href="{{ route('baby.edit') }}" class="text-[12.5px] font-bold text-celeste">Editar</a>
                </x-list-tile>
            @else
                <x-list-tile icon="child_care" title="Sin registrar" subtitle="Agrega los datos de tu bebé">
                    <a href="{{ route('baby.create') }}" class="text-[12.5px] font-bold text-celeste">Registrar</a>
                </x-list-tile>
            @endif
        </div>
    </div>

    <div>
        <div class="text-[12.5px] font-bold uppercase tracking-[.04em] text-ink-2 mb-[9px]">Bienestar</div>
        <div class="bg-card border border-celeste-border rounded-card overflow-hidden">
            <div class="flex items-center gap-3 px-[15px] py-[13px]">
                <x-icon-tile icon="favorite" variant="sec" />
                <span class="flex-1 text-[14.5px] text-ink">Recordatorio diario de bitácora</span>
                <button type="button" data-switch class="w-10 h-6 rounded-full relative flex-none border-none p-0 bg-menta" aria-label="Activar recordatorio">
                    <span class="absolute top-[3px] left-[19px] w-[18px] h-[18px] rounded-full bg-white transition-[left] duration-150"></span>
                </button>
            </div>
            <hr class="h-px bg-celeste-border border-none">
            <div class="flex items-center gap-3 px-[15px] py-[13px]">
                <x-icon-tile icon="volunteer_activism" variant="sec" />
                <a href="{{ route('wellbeing') }}" class="flex-1 text-[14.5px] text-ink">Red de apoyo y contención</a>
                <span class="ms text-[19px] text-ink-2">chevron_right</span>
            </div>
        </div>
    </div>

    <div>
        <div class="text-[12.5px] font-bold uppercase tracking-[.04em] text-ink-2 mb-[9px]">Cuenta</div>
        <div class="bg-card border border-celeste-border rounded-card overflow-hidden divide-y divide-celeste-border">
            <a href="{{ route('legal.privacy') }}" class="flex items-center gap-3 px-[15px] py-[13px]">
                <x-icon-tile icon="verified_user" />
                <span class="flex-1 text-[14.5px] text-ink">Privacidad y datos de salud</span>
                <span class="ms text-[19px] text-ink-2">chevron_right</span>
            </a>
            <a href="{{ route('legal.terms') }}" class="flex items-center gap-3 px-[15px] py-[13px]">
                <x-icon-tile icon="gavel" />
                <span class="flex-1 text-[14.5px] text-ink">Términos y condiciones</span>
                <span class="ms text-[19px] text-ink-2">chevron_right</span>
            </a>
            <a href="{{ route('help.index') }}" class="flex items-center gap-3 px-[15px] py-[13px]">
                <x-icon-tile icon="help" />
                <span class="flex-1 text-[14.5px] text-ink">Ayuda y contacto</span>
                <span class="ms text-[19px] text-ink-2">chevron_right</span>
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full flex items-center justify-center gap-[9px] rounded-[18px] p-4 font-bold text-base border-[1.5px] border-[#F0D6CC] text-coral-text">
            <span class="ms text-[18px]">logout</span>Cerrar sesión
        </button>
    </form>
</x-layout>
