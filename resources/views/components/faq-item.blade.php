@props(['question'])

<details class="group border border-celeste-border rounded-2xl overflow-hidden bg-card [&+details]:mt-[10px]">
    <summary class="list-none cursor-pointer px-4 py-[15px] font-bold text-[14.5px] leading-[1.4] text-ink flex items-center gap-[10px] [&::-webkit-details-marker]:hidden">
        {{ $question }}
        <span class="ms ml-auto text-ink-2 text-xl transition-transform duration-150 group-open:rotate-180">expand_more</span>
    </summary>
    <div class="px-4 pb-4 text-sm leading-[1.55] text-ink-2">
        {{ $slot }}
    </div>
</details>
