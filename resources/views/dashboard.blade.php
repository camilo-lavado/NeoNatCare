<x-layout page="dashboard" title="Dashboard — CuidarIA" with-nav>
    <div class="flex items-center justify-between">
        <div>
            <p class="text-[15px] leading-[1.5] text-ink-2">Buenas noches</p>
            <h1 class="font-heading font-bold text-2xl leading-none text-ink">{{ auth()->user()->name }}</h1>
        </div>
        <a href="{{ route('profile.index') }}" class="rounded-full bg-celeste-accent border border-celeste-border flex items-center justify-center font-bold text-[15px] text-ink-2 w-[46px] h-[46px]">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </a>
    </div>

    <x-card variant="tint-hero">
        <div class="flex items-center gap-3">
            <div class="relative w-[70px] h-[70px] flex-none">
                <svg width="70" height="70" viewBox="0 0 70 70" class="absolute inset-0">
                    <circle cx="35" cy="35" r="30" fill="none" stroke="#fff" stroke-width="6"/>
                    <circle cx="35" cy="35" r="30" fill="none" stroke="#3B9FB4" stroke-width="6" stroke-linecap="round" stroke-dasharray="188" stroke-dashoffset="140" transform="rotate(-90 35 35)"/>
                </svg>
                <div class="absolute inset-[11px] rounded-full flex items-center justify-center text-center text-[8px] font-mono font-semibold text-ink-2"
                     style="background:repeating-linear-gradient(45deg, var(--color-celeste-accent), var(--color-celeste-accent) 8px, #fff 8px, #fff 16px)">
                    foto<br>bebé
                </div>
            </div>
            <div class="flex-1">
                <div class="font-heading font-bold text-xl leading-none text-ink">Lucas</div>
                <div class="text-sm text-ink-2 mt-[3px]">14 días de vida</div>
                <x-chip class="mt-[7px] bg-white">Edad corregida: 6 días</x-chip>
            </div>
        </div>
        <div class="flex gap-[10px] mt-[14px]">
            <div class="flex-1 bg-card border border-celeste-border rounded-[18px] p-[14px]">
                <span class="ms text-[19px] text-celeste">monitor_weight</span>
                <div class="font-heading font-bold text-lg leading-none text-ink mt-[6px]">3,2<span class="text-[10px] text-ink-2">kg</span></div>
                <div class="text-[11.5px] text-ink-2 mt-[2px]">Peso</div>
            </div>
            <div class="flex-1 bg-card border border-celeste-border rounded-[18px] p-[14px]">
                <span class="ms text-[19px] text-celeste">water_drop</span>
                <div class="font-heading font-bold text-lg leading-none text-ink mt-[6px]">8<span class="text-[10px] text-ink-2">/día</span></div>
                <div class="text-[11.5px] text-ink-2 mt-[2px]">Tomas</div>
            </div>
            <div class="flex-1 bg-card border border-celeste-border rounded-[18px] p-[14px]">
                <span class="ms text-[19px] text-celeste">bedtime</span>
                <div class="font-heading font-bold text-lg leading-none text-ink mt-[6px]">15<span class="text-[10px] text-ink-2">h</span></div>
                <div class="text-[11.5px] text-ink-2 mt-[2px]">Sueño</div>
            </div>
        </div>
    </x-card>

    <a href="{{ route('mood-log.index') }}" class="bg-menta-100 rounded-[22px] px-4 py-[15px] flex items-center gap-[13px]">
        <span class="ms text-2xl text-menta-600">favorite</span>
        <div class="flex-1">
            <div class="text-[15px] font-bold text-menta-600">¿Y cómo estás tú hoy?</div>
            <div class="text-[12.5px] text-menta-600">Check-in de 30 segundos</div>
        </div>
        <span class="ms text-xl text-menta-600">chevron_right</span>
    </a>

    <div>
        <div class="flex items-center justify-between mb-[10px]">
            <div class="font-heading font-bold text-base leading-none text-ink">Próximos hitos</div>
            <span class="text-[13px] text-celeste font-bold">Ver todo</span>
        </div>
        <div class="bg-card border border-celeste-border rounded-card py-[6px] px-1">
            <x-list-tile icon="stethoscope" title="Control niño sano" subtitle="Mañana · 10:00" />
            <hr class="h-px bg-celeste-border border-none mx-[13px]">
            <x-list-tile icon="vaccines" title="Vacuna BCG" subtitle="En 3 días" />
        </div>
    </div>

    <div>
        <div class="font-heading font-bold text-base leading-none text-ink mb-[10px]">Últimas alertas</div>
        <x-alert variant="amber" icon="event" :href="route('measurements.create')">
            <b>Control de peso pendiente</b> — registra el peso de hoy
        </x-alert>
        <x-alert variant="celeste" icon="check_circle" class="mt-[9px]">
            Signos vitales dentro de lo normal
        </x-alert>
    </div>

    <x-btn variant="primary" href="{{ route('chat') }}" class="mt-1">
        <span class="ms text-[19px]">chat_bubble</span>
        Consultar con el asistente
    </x-btn>
</x-layout>
