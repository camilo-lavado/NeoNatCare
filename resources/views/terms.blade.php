@php
    $pageKey = 'terms';
    $pageTitle = 'Términos y condiciones';
@endphp
@extends('layouts.legal')

@section('content')
    <x-legal-note>
        Este es un borrador de producto — antes de lanzar a producción debe ser revisado y validado por un asesor legal. No reemplaza asesoría legal real.
    </x-legal-note>

    <section>
        <div class="text-[12.5px] font-bold uppercase tracking-[.04em] text-ink-2 mb-[9px]">Qué es CuidarIA</div>
        <p class="text-base leading-[1.5] text-ink-2">
            CuidarIA es un acompañante digital para madres, padres y otros cuidadores de recién nacidos (0 a 28 días). Combina guías clínicas oficiales (MINSAL, OMS, UNICEF) con contención emocional para quien cuida, ajustando el tono de sus respuestas según tu estado emocional reciente.
        </p>
    </section>

    <section>
        <div class="flex items-start gap-3 rounded-[18px] px-[14px] py-3 bg-coral-bg border border-[#F0C9BB]">
            <span class="ms text-coral-text">emergency_home</span>
            <div class="text-[13.5px] leading-snug">
                <b class="text-coral-text">Lo que CuidarIA no es:</b>
                <span class="text-ink"> no es un servicio médico ni de salud mental, no diagnostica ni prescribe tratamientos, y no reemplaza la evaluación de un pediatra o profesional de salud mental. Es una herramienta de acompañamiento y orientación — las decisiones clínicas sobre tu bebé o sobre ti siempre deben validarse con tu profesional tratante.</span>
            </div>
        </div>
    </section>

    <section>
        <div class="text-[12.5px] font-bold uppercase tracking-[.04em] text-ink-2 mb-[9px]">Ante una urgencia</div>
        <p class="text-base leading-[1.5] text-ink-2">
            Si tú o tu bebé están en riesgo, no esperes una respuesta del asistente: llama de inmediato al <b>SAMU (131)</b> o contacta a tu red de salud mental de urgencia. CuidarIA puede ayudarte a reconocer señales de alerta y derivarte, pero no reemplaza la atención de urgencia.
        </p>
    </section>

    <section>
        <div class="text-[12.5px] font-bold uppercase tracking-[.04em] text-ink-2 mb-[9px]">Quién puede usar CuidarIA</div>
        <p class="text-base leading-[1.5] text-ink-2">
            Cualquier cuidador principal de un recién nacido de 0 a 28 días — madre, padre u otro cuidador — puede crear una cuenta. La orientación clínica sobre el bebé es la misma independiente de tu rol; la app solo adapta el copy de bienestar a tu situación.
        </p>
    </section>

    <section>
        <div class="text-[12.5px] font-bold uppercase tracking-[.04em] text-ink-2 mb-[9px]">Tu cuenta</div>
        <p class="text-base leading-[1.5] text-ink-2">
            Eres responsable de mantener tu contraseña segura y de la exactitud de la información que registras sobre ti y tu bebé. Puedes cerrar tu cuenta o retirar tu consentimiento de tratamiento de datos sensibles en cualquier momento desde tu perfil.
        </p>
    </section>

    <section>
        <div class="text-[12.5px] font-bold uppercase tracking-[.04em] text-ink-2 mb-[9px]">Tus datos</div>
        <p class="text-base leading-[1.5] text-ink-2">
            Tratamos tus datos y los de tu bebé según se detalla en <a href="{{ route('legal.privacy') }}" class="text-celeste font-bold">Privacidad y datos de salud</a>, alineado con la Ley 21.719 de Protección de Datos Personales.
        </p>
    </section>

    <section>
        <div class="text-[12.5px] font-bold uppercase tracking-[.04em] text-ink-2 mb-[9px]">Cambios a estos términos</div>
        <p class="text-base leading-[1.5] text-ink-2">
            Si actualizamos estos términos de forma relevante, te lo notificaremos dentro de la app antes de que entren en vigencia.
        </p>
    </section>
@endsection
