@props(['metrics'])

<div class="flex gap-[10px]">
    @foreach ($metrics as $metric)
        <div class="flex-1 bg-card border border-celeste-border rounded-[18px] p-[14px]">
            <span class="ms text-[19px]" style="color: var(--color-{{ $metric['color'] ?? 'menta-600' }})">{{ $metric['icon'] }}</span>
            <div class="font-heading font-bold text-lg leading-none text-ink mt-[6px]">{{ $metric['value'] }}</div>
            <div class="text-[11.5px] text-ink-2 mt-[2px]">{{ $metric['label'] }}</div>
        </div>
    @endforeach
</div>
