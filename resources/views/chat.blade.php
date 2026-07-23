<x-layout page="chat" title="Asistente CuidarIA — Chat" raw>
    <x-slot:topbar>
        <x-topbar title="Asistente CuidarIA" :back="route('dashboard')" />
    </x-slot:topbar>

    <div class="px-[22px] pt-3">
        <x-chat-mode-toggle :baby-name="auth()->user()->newborn->name ?? 'tu bebé'" />
    </div>

    <div class="py-2 px-[22px] flex items-center justify-center gap-[6px] font-bold text-xs leading-[1.3] mt-[10px] bg-celeste-tint text-celeste"
         data-mode-panel="baby">
        <span class="ms text-sm">verified_user</span>Respuestas basadas en MINSAL · OMS · UNICEF
    </div>
    <div class="py-2 px-[22px] hidden flex items-center justify-center gap-[6px] font-bold text-xs leading-[1.3] bg-menta-100 text-menta-600"
         data-mode-panel="self">
        <span class="ms text-sm">spa</span>Espacio de contención, sin juicio
    </div>

    <div class="flex-1 px-[22px] py-4 flex flex-col gap-[13px] overflow-y-auto" data-mode-panel="baby">
        <div class="max-w-[84%] rounded-[20px_20px_20px_6px] px-[15px] py-[13px] text-[15px] leading-[1.5] bg-card border border-celeste-border text-ink">
            Hola {{ auth()->user()->name }}, soy tu asistente. ¿En qué te ayudo con {{ auth()->user()->newborn->name ?? 'tu bebé' }} hoy?
        </div>
        <div class="self-end max-w-[84%] rounded-[20px_20px_6px_20px] px-[15px] py-[13px] text-[15px] leading-[1.5] text-[#173037] bg-celeste-soft">
            Mi bebé tiene 37,8 °C, ¿debo preocuparme?
        </div>
        <div class="max-w-[88%] rounded-[20px_20px_20px_6px] px-4 py-[14px] text-[15px] leading-[1.5] bg-card border border-celeste-border text-ink">
            Una temperatura de <b>37,8 °C axilar</b> está en el límite. En recién nacidos se considera fiebre desde <b>38 °C</b>. Por ahora te sugiero:
            <div class="mt-[9px] pl-1 text-sm text-ink-2 leading-[1.7]">· No abrigarlo en exceso<br>· Ofrecer pecho más seguido<br>· Volver a medir en 30 min</div>
            <x-alert variant="amber" icon="warning" class="mt-3">
                <b>Signo de alerta:</b> si supera 38 °C o rechaza el alimento, contacta a tu centro de salud.
            </x-alert>
        </div>
        <div class="flex gap-[7px] flex-wrap ml-[2px]">
            <span class="inline-flex items-center gap-[5px] px-[10px] py-[5px] rounded-full bg-celeste-accent border border-celeste-accent-border font-bold text-xs text-celeste">
                <span class="ms text-[13px]">verified</span>MINSAL · Guía RN 2023
            </span>
            <span class="inline-flex items-center gap-[5px] px-[10px] py-[5px] rounded-full bg-celeste-accent border border-celeste-accent-border font-bold text-xs text-celeste">
                <span class="ms text-[13px]">verified</span>OMS · Fiebre neonatal
            </span>
        </div>
        <div class="self-start flex items-center gap-[9px] bg-card border border-celeste-border rounded-full px-[14px] py-[9px] text-[13px] text-ink-2">
            <span class="flex gap-1">
                <span class="w-[7px] h-[7px] rounded-full bg-celeste animate-[ncblink_1.2s_infinite]"></span>
                <span class="w-[7px] h-[7px] rounded-full bg-celeste animate-[ncblink_1.2s_infinite] [animation-delay:.2s]"></span>
                <span class="w-[7px] h-[7px] rounded-full bg-celeste animate-[ncblink_1.2s_infinite] [animation-delay:.4s]"></span>
            </span>
            Consultando guías médicas oficiales…
        </div>
    </div>

    <div class="flex-1 px-[22px] py-4 hidden flex flex-col gap-[13px] overflow-y-auto" data-mode-panel="self">
        <div class="max-w-[84%] rounded-[20px_20px_20px_6px] px-[15px] py-[13px] text-[15px] leading-[1.5] bg-card border border-celeste-border text-ink">
            Hola {{ auth()->user()->name }}. Este espacio es para ti. ¿Cómo te has sentido hoy?
        </div>
        <div class="self-end max-w-[84%] rounded-[20px_20px_6px_20px] px-[15px] py-[13px] text-[15px] leading-[1.5] text-[#173037] bg-menta-soft">
            Siento que no duermo nada y a veces me dan ganas de llorar sin razón
        </div>
        <div class="max-w-[88%] rounded-[20px_20px_20px_6px] px-4 py-[14px] text-[15px] leading-[1.5] bg-card border border-celeste-border text-ink">
            Gracias por contármelo, no estás fallando en nada — lo que describes es muy común en el posparto y tiene nombre y apoyo. Unas ideas para hoy:
            <div class="mt-[9px] pl-1 text-sm text-ink-2 leading-[1.7]">· Duerme cuando el bebé duerma, aunque sea 20 min<br>· Pide a alguien que te acompañe esta noche<br>· No tienes que sostenerlo todo sola</div>
            <div class="flex items-center gap-3 rounded-[18px] px-[14px] py-3 mt-3 bg-menta-100 text-ink-2 text-[13.5px] leading-snug">
                <span class="ms text-menta-600">favorite</span>
                <div>¿Quieres hacer un check-in breve de cómo te sientes? Toma 30 segundos.</div>
            </div>
        </div>
        <x-chip variant="sec" class="self-start"><span class="ms text-[13px]">favorite</span>Apoyo psicológico perinatal · uso general</x-chip>
    </div>

    <div class="px-5 pt-[14px] pb-[22px] border-t border-celeste-border flex gap-[10px] items-center">
        <div class="flex-1 bg-card border border-celeste-border rounded-full px-[18px] py-[13px] text-[15px] text-ink-2" data-mode-only="baby">Escribe tu consulta…</div>
        <div class="flex-1 hidden bg-card border border-celeste-border rounded-full px-[18px] py-[13px] text-[15px] text-ink-2" data-mode-only="self">Cuéntame cómo te sientes…</div>
        <button type="button" class="ms w-12 h-12 rounded-full flex-none flex items-center justify-center text-white text-[21px] bg-celeste shadow-[0_8px_18px_rgba(59,159,180,.35)]" data-mode-only="baby">send</button>
        <button type="button" class="ms w-12 h-12 rounded-full flex-none hidden flex items-center justify-center text-white text-[21px] bg-menta shadow-[0_8px_18px_rgba(127,203,176,.5)]" data-mode-only="self">send</button>
    </div>
</x-layout>
