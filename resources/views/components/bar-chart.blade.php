@props(['bars', 'height' => 110])

<div class="bg-card border border-celeste-border rounded-[20px] p-4 flex items-end gap-2" style="height: {{ $height }}px">
    @foreach ($bars as $bar)
        @php
            $variant = $bar['variant'] ?? 'default';
            $barColor = match ($variant) {
                'warn' => 'bg-amber',
                'peak' => 'bg-menta-2',
                default => 'bg-menta',
            };
        @endphp
        <div class="flex-1 flex flex-col items-center gap-[6px]">
            <div class="w-full rounded-[6px] {{ $barColor }}" style="height: {{ $bar['height'] }}px"></div>
            <span class="text-[10px] text-ink-2 {{ !empty($bar['active']) ? 'font-bold' : '' }}">{{ $bar['label'] }}</span>
        </div>
    @endforeach
</div>
