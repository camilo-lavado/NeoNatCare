@props(['selectedSleep' => '4-6', 'selectedMood' => 'normal', 'anxiety' => 55])

@php
    $sleepOptions = [
        'lt4' => '< 4h',
        '4-6' => '4–6h',
        '6-8' => '6–8h',
        '8+' => '+8h',
    ];
    $moodOptions = [
        'exhausted' => ['😩', 'Agotada'],
        'low' => ['😔', 'Baja'],
        'normal' => ['😐', 'Normal'],
        'good' => ['🙂', 'Bien'],
        'energetic' => ['😄', 'Con energía'],
    ];
@endphp

<div>
    <div class="text-[13px] font-bold text-ink mb-[10px]">¿Cuánto dormiste?</div>
    <input type="hidden" name="sleep_hours" value="{{ $selectedSleep }}" data-sleep-hidden>
    <div class="flex gap-2 flex-wrap" data-chip-group>
        @foreach ($sleepOptions as $value => $label)
            @php $isSelected = $value === $selectedSleep; @endphp
            <button type="button" data-sleep="{{ $value }}"
                class="chip-option px-[15px] py-[11px] rounded-full border-[1.5px] font-bold text-[13.5px]
                    {{ $isSelected ? 'border-menta bg-menta-100 text-menta-600' : 'border-celeste-border bg-card text-ink-2' }}">
                {{ $label }}
            </button>
        @endforeach
    </div>
</div>

<div>
    <div class="text-[13px] font-bold text-ink mb-[10px]">¿Cómo está tu ánimo?</div>
    <input type="hidden" name="mood" value="{{ $selectedMood }}" data-mood-hidden>
    <div class="flex justify-between" data-mood-group>
        @foreach ($moodOptions as $value => [$emoji, $label])
            @php $isSelected = $value === $selectedMood; @endphp
            <button type="button" data-mood-option="{{ $value }}" class="text-center flex-1 bg-transparent border-none">
                <span data-mood-face class="w-[46px] h-[46px] rounded-full border-[1.5px] flex items-center justify-center text-[22px] mx-auto
                    {{ $isSelected ? 'bg-menta-100 border-menta' : 'bg-card border-celeste-border' }}">{{ $emoji }}</span>
                <span data-mood-label class="block text-[11px] mt-[5px] {{ $isSelected ? 'text-menta-600 font-bold' : 'text-ink-2' }}">{{ $label }}</span>
            </button>
        @endforeach
    </div>
</div>

<div>
    <div class="flex justify-between text-[13px] font-bold text-ink mb-3">
        <span>Nivel de ansiedad</span>
        <span class="text-menta-600" data-anxiety-label>Moderado</span>
    </div>
    <div class="relative h-2 rounded-[9px]" style="background:linear-gradient(90deg, var(--color-menta), var(--color-amber) 55%, var(--color-coral))">
        <input type="range" name="anxiety_level" min="0" max="100" value="{{ $anxiety }}" aria-label="Nivel de ansiedad" data-anxiety-range
            class="absolute -top-[7px] left-0 w-full h-[22px] m-0 appearance-none bg-transparent cursor-pointer
                [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:w-[22px] [&::-webkit-slider-thumb]:h-[22px]
                [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-white [&::-webkit-slider-thumb]:border-4
                [&::-webkit-slider-thumb]:border-amber [&::-webkit-slider-thumb]:shadow-[0_2px_6px_rgba(38,56,60,.25)] [&::-webkit-slider-thumb]:cursor-pointer">
    </div>
    <div class="flex justify-between text-xs text-ink-2 mt-2"><span>Tranquila</span><span>Muy ansiosa</span></div>
</div>
