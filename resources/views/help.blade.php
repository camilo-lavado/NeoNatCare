<x-layout page="help" title="Ayuda y contacto — CuidarIA">
    <x-slot:topbar>
        <x-topbar title="Ayuda y contacto" back="javascript:history.back()" />
    </x-slot:topbar>

    <section>
        <div class="text-[12.5px] font-bold uppercase tracking-[.04em] text-ink-2 mb-[9px]">Contáctanos</div>
        <div class="bg-card border border-celeste-border rounded-card overflow-hidden divide-y divide-celeste-border">
            <div class="flex items-center gap-3 px-[15px] py-[13px]">
                <x-icon-tile icon="mail" />
                <div class="flex-1">
                    <div class="text-[14.5px] font-bold text-ink">soporte@cuidaria.cl</div>
                    <div class="text-[12.5px] text-ink-2 mt-[2px]">Respondemos dentro de 24 horas hábiles</div>
                </div>
            </div>
            <a href="{{ route('chat') }}" class="flex items-center gap-3 px-[15px] py-[13px]">
                <x-icon-tile icon="chat" />
                <div class="flex-1">
                    <div class="text-[14.5px] font-bold text-ink">Chat con el asistente</div>
                    <div class="text-[12.5px] text-ink-2 mt-[2px]">Disponible 24/7 para dudas sobre el bebé o tu bienestar</div>
                </div>
                <span class="ms text-[19px] text-ink-2">chevron_right</span>
            </a>
            <div class="flex items-center gap-3 px-[15px] py-[13px]">
                <x-icon-tile icon="shield_person" variant="sec" />
                <div class="flex-1">
                    <div class="text-[14.5px] font-bold text-ink">dpo@cuidaria.cl</div>
                    <div class="text-[12.5px] text-ink-2 mt-[2px]">Consultas sobre privacidad y tus datos personales</div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="text-[12.5px] font-bold uppercase tracking-[.04em] text-ink-2 mb-[9px]">¿Necesitas ayuda urgente?</div>
        <a href="{{ route('urgent.caregiver') }}" class="bg-coral-bg rounded-[20px] p-[18px] flex items-center gap-[14px]">
            <span class="ms w-11 h-11 rounded-[14px] bg-white flex items-center justify-center text-[22px] text-coral-text flex-none">volunteer_activism</span>
            <div class="flex-1">
                <div class="text-[14.5px] font-bold text-coral-text">Líneas de contención emocional</div>
                <div class="text-[12.5px] text-coral-text mt-[2px]">Salud Responde · 600 360 7777, disponible 24/7</div>
            </div>
            <span class="ms text-xl text-coral-text">chevron_right</span>
        </a>
    </section>

    <section>
        <div class="text-[12.5px] font-bold uppercase tracking-[.04em] text-ink-2 mb-[9px]">Preguntas frecuentes</div>

        <x-faq-item question="¿CuidarIA reemplaza a mi pediatra o a un profesional de salud mental?">
            No. CuidarIA entrega orientación basada en guías oficiales (MINSAL, OMS, UNICEF) y contención emocional, pero no reemplaza una consulta médica ni psicológica. Ante cualquier urgencia, siempre te derivamos a atención profesional. Ver el detalle en <a href="{{ route('legal.terms') }}" class="text-celeste font-bold">Términos y condiciones</a>.
        </x-faq-item>

        <x-faq-item question="¿Qué pasa si el chat detecta una urgencia?">
            Si detectamos señales de riesgo médico para el bebé o de crisis de salud mental para ti, el asistente muestra de inmediato una pantalla de derivación con contacto directo a servicios de urgencia (SAMU) o a la red de salud mental perinatal.
        </x-faq-item>

        <x-faq-item question="¿Puedo eliminar mis datos?">
            Sí. Puedes ejercer tu derecho de supresión en cualquier momento escribiendo a dpo@cuidaria.cl. Ver el detalle de todos tus derechos (ARSOPB) en <a href="{{ route('legal.privacy') }}" class="text-celeste font-bold">Privacidad y datos de salud</a>.
        </x-faq-item>

        <x-faq-item question="¿Dónde reviso la política de privacidad?">
            En <a href="{{ route('legal.privacy') }}" class="text-celeste font-bold">Privacidad y datos de salud</a>, dentro de tu perfil. Ahí explicamos qué datos tratamos, por qué son datos sensibles y cómo ejercer tus derechos bajo la Ley 21.719.
        </x-faq-item>

        <x-faq-item question="¿CuidarIA es solo para madres?">
            No. Al crear tu cuenta puedes indicar si eres madre, padre u otro cuidador — la orientación clínica sobre el bebé es la misma para todos, solo adaptamos el copy de bienestar a tu rol.
        </x-faq-item>
    </section>
</x-layout>
