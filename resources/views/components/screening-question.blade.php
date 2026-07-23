@props(['exitRoute'])

<div data-screening data-exit-url="{{ $exitRoute }}" class="flex flex-col gap-[18px] flex-1">
    <div class="flex items-center gap-3">
        <button type="button" data-question-back class="ms text-[22px] text-ink-2 bg-transparent border-none">arrow_back_ios_new</button>
        <div class="flex-1 h-2 rounded-[9px] bg-celeste-border overflow-hidden">
            <div data-progress-fill class="h-full rounded-[9px] bg-celeste transition-[width] duration-200" style="width: 12.5%"></div>
        </div>
    </div>

    <div data-progress-label class="text-[13px] font-bold text-ink-2"></div>

    <h1 data-question-text class="font-heading font-bold text-[23px] leading-[1.35] text-ink m-0"></h1>

    <div data-option-list class="flex flex-col gap-[10px] mt-[6px]"></div>

    <x-alert variant="sec" icon="info" class="mt-auto">
        Esto es un apoyo, no un diagnóstico. Tus respuestas son privadas.
    </x-alert>
</div>
