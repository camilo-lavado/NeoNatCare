@props(['babyName' => 'Lucas'])

<div class="flex rounded-full p-1 gap-1 bg-celeste-accent" data-chat-toggle>
    <button type="button" data-mode="baby"
        class="flex-1 flex items-center justify-center gap-[6px] py-[10px] rounded-full font-bold text-sm leading-none bg-card shadow-[0_2px_6px_rgba(38,56,60,.08)] text-ink">
        <span class="ms text-base">child_care</span>Sobre {{ $babyName }}
    </button>
    <button type="button" data-mode="self"
        class="flex-1 flex items-center justify-center gap-[6px] py-[10px] rounded-full font-bold text-sm leading-none text-menta-600">
        <span class="ms text-base">favorite</span>Para mí
    </button>
</div>
