<x-layout page="qr" title="Escanea CuidarIA" raw>
    <div class="min-h-screen flex flex-col gap-[18px] px-6 pt-5 pb-6 bg-celeste text-white">
        <div class="flex items-center gap-3">
            <span class="w-[30px] h-[30px] rounded-[9px] bg-white"></span>
            <span class="font-heading font-bold text-lg leading-none text-white">CuidarIA</span>
        </div>

        <div>
            <div class="text-[13px] font-bold tracking-[.04em] text-celeste-accent">MATERNIDAD · CUIDADO INTEGRAL</div>
            <h1 class="font-heading font-bold text-[28px] leading-[1.2] text-white mt-[10px]">Apoyo para tu bebé y para ti</h1>
            <p class="text-[15.5px] leading-[1.5] text-white/90 mt-[10px]">Guías del recién nacido y bienestar emocional del cuidador, en un solo lugar.</p>
        </div>

        <div class="bg-white rounded-[28px] p-[22px] flex flex-col items-center gap-[14px]">
            <img src="{{ asset('images/qr.svg') }}" width="190" height="190" alt="Código QR de acceso a CuidarIA" class="block rounded-lg">
            <div class="flex items-center gap-3 font-heading font-bold text-[15px] leading-[1.2] text-ink text-center">
                <span class="ms text-[19px] text-celeste">photo_camera</span>Escanea con tu teléfono
            </div>
            <div class="flex items-center gap-[7px]">
                <x-chip>MINSAL</x-chip>
                <x-chip>OMS</x-chip>
                <x-chip>UNICEF</x-chip>
            </div>
        </div>

        <div class="mt-auto flex items-center justify-between pt-4 border-t border-white/25">
            <span class="text-[13px] text-white/85">Hospital / CESFAM ____________</span>
            <span class="font-bold text-[13px] leading-none text-white">Gratis</span>
        </div>
    </div>
</x-layout>
