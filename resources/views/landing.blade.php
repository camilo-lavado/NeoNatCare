<x-layout title="CuidarIA — Cuidar a tu bebé también es cuidarte a ti" marketing>
    {{-- Nav --}}
    <header class="border-b border-celeste-border bg-celeste-bg/80 backdrop-blur sticky top-0 z-10">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo-mark.png') }}" alt="" class="w-8 h-8 object-contain">
                <span class="font-heading font-bold text-lg text-ink">CuidarIA</span>
            </div>
            <nav class="flex items-center gap-3">
                <a href="{{ route('login') }}" class="hidden sm:inline-block font-bold text-[15px] text-ink-2 px-3 py-2">Ingresar</a>
                <a href="{{ route('register') }}" class="inline-flex items-center rounded-[14px] bg-celeste text-white font-bold text-sm px-5 py-[10px] shadow-[0_8px_18px_rgba(59,159,180,.3)]">Crear cuenta gratis</a>
            </nav>
        </div>
    </header>

    {{-- Hero --}}
    <section class="max-w-6xl mx-auto px-6 pt-16 pb-20 grid md:grid-cols-2 gap-12 items-center">
        <div>
            <span class="inline-flex items-center gap-2 rounded-full bg-celeste-accent border border-celeste-accent-border text-celeste font-bold text-xs px-3 py-[6px]">
                <span class="ms text-[14px]">favorite</span>Para el bebé y para quien lo cuida
            </span>

            <h1 class="font-heading font-bold text-[2.5rem] md:text-[3.25rem] leading-[1.1] text-ink mt-5">
                Cuidar a tu bebé también es <span class="text-celeste">cuidarte a ti</span>
            </h1>

            <p class="text-lg leading-[1.6] text-ink-2 mt-5 max-w-lg">
                CuidarIA combina guías clínicas oficiales para los primeros 28 días del recién nacido con contención emocional real para quien lo cuida — en un solo lugar, ajustado a cómo te sientes hoy.
            </p>

            <div class="flex flex-wrap items-center gap-4 mt-8">
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-[9px] rounded-[18px] px-8 py-4 font-bold text-base text-white bg-celeste shadow-[0_10px_22px_rgba(59,159,180,.35)]">Crear cuenta gratis</a>
                <a href="{{ route('login') }}" class="inline-flex items-center font-bold text-[15px] text-celeste px-2 py-2">Ya tengo cuenta · Ingresar</a>
            </div>

            <div class="mt-10">
                <p class="text-xs font-bold uppercase tracking-[.08em] text-ink-2 mb-3">Contenido validado con</p>
                <div class="flex gap-2">
                    <x-chip>MINSAL</x-chip>
                    <x-chip>OMS</x-chip>
                    <x-chip>UNICEF</x-chip>
                </div>
            </div>
        </div>

        <div class="relative">
            <div class="aspect-[4/5] max-w-sm mx-auto rounded-[32px] bg-celeste-tint border border-celeste-border flex items-center justify-center p-6">
                <img src="{{ asset('images/landing-hero.png') }}" alt="Una madre sostiene con calma a su recién nacido en brazos"
                     class="w-full h-full object-contain">
            </div>
        </div>
    </section>

    {{-- Doble enfoque --}}
    <section class="bg-card border-y border-celeste-border">
        <div class="max-w-6xl mx-auto px-6 py-20">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <h2 class="font-heading font-bold text-3xl text-ink">Dos frentes, un solo acompañante</h2>
                <p class="text-ink-2 text-lg mt-3">Un cuidador contenido, informado y con sueño suficiente es la mejor garantía de un cuidado neonatal seguro.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div class="rounded-[22px] bg-celeste-tint p-8">
                    <span class="ms w-12 h-12 rounded-2xl bg-white text-celeste flex items-center justify-center text-2xl">child_care</span>
                    <h3 class="font-heading font-bold text-xl text-ink mt-5">Salud del recién nacido</h3>
                    <p class="text-ink-2 mt-2 leading-[1.6]">Guías oficiales MINSAL, OMS y UNICEF para los primeros 28 días: control de peso, tomas, sueño, hitos y señales de alerta, citadas en cada respuesta.</p>
                    <ul class="mt-5 space-y-3">
                        <li class="flex items-center gap-3 text-sm text-ink"><span class="ms text-celeste text-lg">verified</span>Fuentes clínicas citadas en cada respuesta</li>
                        <li class="flex items-center gap-3 text-sm text-ink"><span class="ms text-celeste text-lg">emergency_home</span>Derivación inmediata ante urgencia médica</li>
                        <li class="flex items-center gap-3 text-sm text-ink"><span class="ms text-celeste text-lg">monitor_weight</span>Registro rápido de controles diarios</li>
                    </ul>
                </div>

                <div class="rounded-[22px] bg-menta-100 p-8">
                    <span class="ms w-12 h-12 rounded-2xl bg-white text-menta-600 flex items-center justify-center text-2xl">favorite</span>
                    <h3 class="font-heading font-bold text-xl text-menta-600 mt-5">Bienestar del cuidador</h3>
                    <p class="text-menta-600 mt-2 leading-[1.6] opacity-90">Bitácora emocional de 30 segundos, tamizaje breve de estrés perinatal y un asistente que ajusta su tono según cómo has dormido y cómo te sientes.</p>
                    <ul class="mt-5 space-y-3">
                        <li class="flex items-center gap-3 text-sm text-menta-600"><span class="ms text-lg">bedtime</span>Check-in diario de sueño y ánimo</li>
                        <li class="flex items-center gap-3 text-sm text-menta-600"><span class="ms text-lg">psychology</span>Tamizaje breve — no es un diagnóstico</li>
                        <li class="flex items-center gap-3 text-sm text-menta-600"><span class="ms text-lg">volunteer_activism</span>Red de contención siempre visible</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Cómo funciona --}}
    <section class="max-w-6xl mx-auto px-6 py-20">
        <h2 class="font-heading font-bold text-3xl text-ink text-center">Cómo funciona</h2>

        <div class="grid sm:grid-cols-3 gap-8 mt-12">
            <div class="text-center">
                <div class="w-11 h-11 rounded-full bg-celeste text-white font-heading font-bold flex items-center justify-center mx-auto">1</div>
                <h3 class="font-heading font-bold text-lg text-ink mt-4">Crea tu cuenta</h3>
                <p class="text-ink-2 mt-2 leading-[1.6]">Solo tu primer nombre y tu rol — madre, padre u otro cuidador. Minimizamos los datos que pedimos desde el primer paso.</p>
            </div>
            <div class="text-center">
                <div class="w-11 h-11 rounded-full bg-celeste text-white font-heading font-bold flex items-center justify-center mx-auto">2</div>
                <h3 class="font-heading font-bold text-lg text-ink mt-4">Registra a tu bebé</h3>
                <p class="text-ink-2 mt-2 leading-[1.6]">Fecha de nacimiento y semanas de gestación para calcular su edad corregida y adaptar cada guía a su etapa.</p>
            </div>
            <div class="text-center">
                <div class="w-11 h-11 rounded-full bg-celeste text-white font-heading font-bold flex items-center justify-center mx-auto">3</div>
                <h3 class="font-heading font-bold text-lg text-ink mt-4">Recibe acompañamiento</h3>
                <p class="text-ink-2 mt-2 leading-[1.6]">Chat dual — "sobre el bebé" y "para mí" — más bitácora emocional y tamizaje, todo en un solo lugar.</p>
            </div>
        </div>
    </section>

    {{-- CTA final --}}
    <section class="bg-celeste">
        <div class="max-w-4xl mx-auto px-6 py-16 text-center">
            <h2 class="font-heading font-bold text-3xl text-white">Empieza hoy, gratis</h2>
            <p class="text-white/90 text-lg mt-3 max-w-xl mx-auto">Tus datos de salud y bienestar están protegidos y cifrados, con consentimiento explícito y revocable en cualquier momento.</p>
            <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-[9px] rounded-[18px] px-8 py-4 mt-8 font-bold text-base bg-white text-celeste">Crear cuenta gratis</a>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-celeste-bg">
        <div class="max-w-6xl mx-auto px-6 py-10 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/logo-mark.png') }}" alt="" class="w-6 h-6 object-contain">
                <span class="font-heading font-bold text-ink">CuidarIA</span>
            </div>
            <nav class="flex flex-wrap items-center justify-center gap-x-6 gap-y-2 text-sm text-ink-2">
                <a href="{{ route('legal.privacy') }}">Privacidad y datos de salud</a>
                <a href="{{ route('legal.terms') }}">Términos y condiciones</a>
                <a href="{{ route('help.index') }}">Ayuda y contacto</a>
                <a href="{{ route('qr.index') }}">Lámina QR</a>
            </nav>
        </div>
    </footer>
</x-layout>
