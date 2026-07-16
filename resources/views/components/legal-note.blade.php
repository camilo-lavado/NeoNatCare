@props(['icon' => 'verified_user'])

<div {{ $attributes->merge(['class' => 'bg-celeste-tint rounded-2xl px-4 py-[14px] text-[13px] leading-[1.5] text-ink-2']) }}>
    <span class="ms text-celeste align-[-4px]">{{ $icon }}</span>
    {{ $slot }}
</div>
