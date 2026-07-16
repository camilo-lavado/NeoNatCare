<x-layout page="privacy" title="Privacidad y datos de salud — CuidarIA">
    <x-slot:topbar>
        <x-topbar title="Privacidad y datos de salud" back="javascript:history.back()" />
    </x-slot:topbar>

    <x-legal-note>
        Este resumen está alineado con la <b>Ley 21.719 de Protección de Datos Personales</b>, que rige en Chile en plenitud desde el <b>1 de diciembre de 2026</b>. Es un borrador de producto — antes de lanzar a producción debe ser revisado y validado por un asesor legal.
    </x-legal-note>

    <section>
        <div class="text-[12.5px] font-bold uppercase tracking-[.04em] text-ink-2 mb-[9px]">Qué datos tratamos</div>
        <p class="text-base leading-[1.5] text-ink-2">Para poder acompañarte a ti y a tu bebé, tratamos:</p>
        <div class="bg-card border border-celeste-border rounded-card overflow-hidden divide-y divide-celeste-border mt-[10px]">
            <x-list-tile icon="badge" title="Datos de cuenta" subtitle="Nombre (solo tu primer nombre), correo, contraseña cifrada, tu rol de vínculo con el bebé (madre, padre u otro cuidador)" />
            <x-list-tile icon="child_care" title="Datos del bebé" subtitle="Nombre (solo su primer nombre), fecha de nacimiento, semanas de gestación, puntaje Apgar (opcional), peso, tomas, sueño, hitos" />
            <x-list-tile icon="favorite" iconVariant="sec" title="Bitácora emocional y tamizaje" subtitle="Ánimo, ansiedad, horas de sueño, notas y puntaje de tamizaje" />
            <x-list-tile icon="forum" title="Historial de conversaciones" subtitle="Preguntas y respuestas del asistente, en ambos modos" />
        </div>
        <p class="text-base leading-[1.5] text-ink-2 mt-[10px]">
            Aplicamos <b>minimización de datos</b>: pedimos solo tu primer nombre y el de tu bebé, nunca apellidos ni otros datos de identificación que no sean necesarios para el propósito clínico y de contención de la app.
        </p>
    </section>

    <section>
        <div class="text-[12.5px] font-bold uppercase tracking-[.04em] text-ink-2 mb-[9px]">Por qué son datos sensibles</div>
        <p class="text-base leading-[1.5] text-ink-2">
            Los datos de salud del bebé y los datos de bienestar emocional del cuidador son <b>datos sensibles</b> bajo la Ley 21.719, junto con otras categorías como origen étnico o afiliación sindical. Reciben protección reforzada: no los usamos para publicidad, no los vendemos ni los compartimos con terceros fuera del propósito clínico y de contención de CuidarIA.
        </p>
    </section>

    <section>
        <div class="text-[12.5px] font-bold uppercase tracking-[.04em] text-ink-2 mb-[9px]">Tu consentimiento</div>
        <p class="text-base leading-[1.5] text-ink-2">
            Por tratarse de datos sensibles, tu consentimiento es siempre <b>explícito, específico y revocable</b> — nunca viene precasillado ni escondido dentro de otros términos. Puedes retirarlo en cualquier momento desde tu perfil, sin que eso afecte la licitud del tratamiento previo.
        </p>
    </section>

    <section>
        <div class="text-[12.5px] font-bold uppercase tracking-[.04em] text-ink-2 mb-[9px]">Tus derechos (ARSOPB)</div>
        <div class="flex flex-col gap-[10px]">
            @foreach ([
                ['A', 'Acceso', 'saber qué datos tuyos y de tu bebé tenemos y para qué los usamos.'],
                ['R', 'Rectificación', 'corregir datos inexactos o desactualizados.'],
                ['S', 'Supresión', 'pedir la eliminación de tus datos cuando ya no sean necesarios.'],
                ['O', 'Oposición', 'oponerte a un tratamiento específico de tus datos.'],
                ['P', 'Portabilidad', 'recibir tus datos en un formato estructurado y de uso común.'],
                ['B', 'Bloqueo temporal', 'suspender temporalmente el tratamiento mientras se resuelve una solicitud.'],
            ] as [$letter, $right, $desc])
                <div class="flex gap-3 items-start">
                    <span class="w-7 h-7 rounded-full bg-celeste-accent text-celeste font-heading font-bold text-[13px] flex-none flex items-center justify-center">{{ $letter }}</span>
                    <div class="text-base leading-[1.5] text-ink-2"><b class="text-ink">{{ $right }}</b> — {{ $desc }}</div>
                </div>
            @endforeach
        </div>
        <x-btn variant="link" href="{{ route('help.index') }}" class="mt-[6px]">Ejercer uno de estos derechos</x-btn>
    </section>

    <section>
        <div class="text-[12.5px] font-bold uppercase tracking-[.04em] text-ink-2 mb-[9px]">Seguridad y notificación de incidentes</div>
        <p class="text-base leading-[1.5] text-ink-2">
            Tus datos viajan y se guardan cifrados. Si ocurriera una vulneración de seguridad, notificamos a la Agencia de Protección de Datos Personales dentro de 72 horas y, si existe un riesgo alto para tus derechos, también te avisamos a ti sin dilación indebida.
        </p>
    </section>

    <section>
        <div class="text-[12.5px] font-bold uppercase tracking-[.04em] text-ink-2 mb-[9px]">Delegado de Protección de Datos</div>
        <div class="bg-card border border-celeste-border rounded-card flex items-center gap-3 px-[15px] py-[13px]">
            <x-icon-tile icon="shield_person" />
            <div class="flex-1">
                <div class="text-[14.5px] font-bold text-ink">dpo@cuidaria.cl</div>
                <div class="text-[12.5px] text-ink-2 mt-[2px]">Para consultas o solicitudes sobre tus datos personales</div>
            </div>
        </div>
    </section>

    <x-btn variant="link" href="{{ route('legal.terms') }}">Ver términos y condiciones</x-btn>
</x-layout>
