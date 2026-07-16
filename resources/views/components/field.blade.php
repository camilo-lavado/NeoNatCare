@props(['label' => null, 'hint' => null, 'error' => null])

<div class="flex flex-col gap-[7px]">
    @if ($label)
        <label class="text-[13px] font-bold text-ink">{{ $label }}</label>
    @endif

    <div data-field-control class="bg-card border border-celeste-border rounded-2xl px-4 py-[15px] text-[15px] text-ink flex items-center gap-[11px]
        [&_input]:flex-1 [&_input]:border-none [&_input]:outline-none [&_input]:text-[15px] [&_input]:text-ink [&_input]:bg-transparent
        [&_.ms]:text-celeste [&_button]:bg-transparent [&_button]:border-none [&_button]:p-0 [&_button]:text-ink-2">
        {{ $slot }}
    </div>

    @if ($hint)
        <p class="text-xs text-ink-2 -mt-[3px]">{{ $hint }}</p>
    @endif

    @if ($error)
        <p class="text-[12.5px] text-coral-text -mt-[6px]">{{ $error }}</p>
    @endif
</div>
