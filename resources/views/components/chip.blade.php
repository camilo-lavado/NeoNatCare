@props(['variant' => 'default', 'selected' => false])

@php
    $variants = [
        'default' => 'bg-celeste-accent text-celeste',
        'sec' => 'bg-menta-100 text-menta-600',
        'outline' => 'border-[1.5px] border-celeste-border bg-card text-ink-2',
    ];
    $classes = $selected
        ? 'border-[1.5px] border-menta bg-menta-100 text-menta-600'
        : ($variants[$variant] ?? $variants['default']);
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center gap-[5px] px-3 py-[6px] rounded-full font-bold text-xs leading-none ' . $classes]) }}>
    {{ $slot }}
</span>
