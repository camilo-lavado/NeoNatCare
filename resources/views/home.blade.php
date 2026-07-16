<x-layout page="landing" title="CuidarIA — Cuidar a tu bebé también es cuidarte a ti">
    <div class="flex items-center gap-3">
        <span class="w-[28px] h-[28px] rounded-[9px] bg-celeste"></span>
        <span class="font-heading font-bold text-lg leading-none text-ink">CuidarIA</span>
    </div>

    <div class="flex items-center justify-center text-center text-[11px] font-mono font-semibold text-ink-2 rounded-[26px]"
         style="aspect-ratio:1.5;background:repeating-linear-gradient(45deg, var(--color-celeste-accent), var(--color-celeste-accent) 8px, #fff 8px, #fff 16px)">
        ilustración<br>familia + bebé
    </div>

    <h1 class="font-heading font-bold text-[27px] leading-[1.2] text-ink">Cuidar a tu bebé también es cuidarte a ti</h1>
    <p class="text-base leading-[1.5] text-ink-2">Guías para el recién nacido y apoyo emocional para quien lo cuida, en un solo lugar.</p>

    <x-btn variant="primary" href="{{ route('register') }}">Crear cuenta gratis</x-btn>
    <x-btn variant="link" href="{{ route('login') }}">Ya tengo cuenta · Ingresar</x-btn>

    <hr class="h-px bg-celeste-border border-none my-[2px]">

    <div>
        <p class="text-center text-xs text-ink-2 mb-[9px]">Contenido validado con</p>
        <div class="flex items-center justify-center gap-[7px]">
            <x-chip>MINSAL</x-chip>
            <x-chip>OMS</x-chip>
            <x-chip>UNICEF</x-chip>
        </div>
    </div>

    <div class="flex flex-col gap-3 mt-[2px]">
        <div class="flex items-center gap-3">
            <x-icon-tile icon="forum" />
            <div>
                <div class="text-[14.5px] font-bold text-ink">Asistente 24/7</div>
                <div class="text-[12.5px] text-ink-2 mt-[2px]">Para el bebé y para ti</div>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <x-icon-tile icon="favorite" variant="sec" />
            <div>
                <div class="text-[14.5px] font-bold text-ink">Bienestar emocional</div>
                <div class="text-[12.5px] text-ink-2 mt-[2px]">Bitácora diaria y tamizaje breve</div>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <x-icon-tile icon="verified" />
            <div>
                <div class="text-[14.5px] font-bold text-ink">Guías oficiales</div>
                <div class="text-[12.5px] text-ink-2 mt-[2px]">MINSAL, OMS y UNICEF citadas</div>
            </div>
        </div>
    </div>
</x-layout>
