@props(['title', 'back' => null])

<div class="flex items-center gap-3 px-6 pt-[18px] pb-[6px] border-b border-celeste-border">
    @if ($back)
        <a href="{{ $back }}" class="ms text-[22px] text-ink-2">arrow_back_ios_new</a>
    @endif
    <div class="flex-1 font-heading font-bold text-[17px] leading-none text-ink">{{ $title }}</div>
    {{ $slot ?? '' }}
</div>
