@props([
    'icon', 'title', 'copy',
    'primaryLabel', 'primaryHref',
    'secondaryIcon', 'secondaryLabel', 'secondaryHref' => '#',
    'secondaryIconColor' => 'text-celeste',
    'chatHref',
    'footerIcon' => 'verified', 'footerText', 'footerIconColor' => 'text-celeste',
    'backdropBubble', 'backdropVariant' => 'celeste',
])

<div class="min-h-screen flex flex-col relative">
    <div class="px-[22px] py-[18px] flex flex-col gap-3" style="filter:blur(1.5px);opacity:.55">
        <div class="self-end max-w-[84%] rounded-[20px_20px_6px_20px] px-[15px] py-[13px] text-[15px] leading-[1.5] text-[#173037] {{ $backdropVariant === 'sec' ? 'bg-menta-soft' : 'bg-celeste-soft' }}">
            {{ $backdropBubble }}
        </div>
        <div class="bg-card border border-celeste-border rounded-card h-14"></div>
    </div>

    <div class="fixed inset-0 bg-[rgba(38,56,60,.5)] z-10"></div>

    <div class="fixed left-1/2 -translate-x-1/2 bottom-0 w-full max-w-[480px] z-20 bg-card rounded-t-[30px] px-[22px] pt-6"
         style="padding-bottom: calc(24px + env(safe-area-inset-bottom, 0px)); box-shadow: 0 -10px 40px rgba(38,56,60,.35)">
        <div class="ms w-14 h-14 rounded-[18px] bg-coral-bg text-coral flex items-center justify-center text-[30px]">{{ $icon }}</div>
        <h1 class="font-heading font-bold text-[22px] leading-[1.2] text-ink mt-4">{{ $title }}</h1>
        <p class="text-[15px] leading-[1.55] text-ink-2 mt-[9px]">{{ $copy }}</p>

        <x-btn variant="primary-coral" href="{{ $primaryHref }}" class="mt-[18px]">
            <span class="ms text-xl">call</span>{{ $primaryLabel }}
        </x-btn>
        <x-btn variant="secondary" href="{{ $secondaryHref }}" class="mt-[10px]">
            <span class="ms text-[19px] {{ $secondaryIconColor }}">{{ $secondaryIcon }}</span>{{ $secondaryLabel }}
        </x-btn>
        <x-btn variant="text" href="{{ $chatHref }}" class="mt-[14px]">Seguir en el chat</x-btn>

        <div class="flex items-center gap-[7px] justify-center mt-4 pt-[14px] border-t border-celeste-border text-xs text-ink-2">
            <span class="ms text-[15px] {{ $footerIconColor }}">{{ $footerIcon }}</span>
            <span>{{ $footerText }}</span>
        </div>
    </div>
</div>
