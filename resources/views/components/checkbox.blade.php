@props(['name', 'id' => null, 'checked' => false])

<input type="checkbox" name="{{ $name }}" id="{{ $id ?? $name }}" @checked($checked)
    {{ $attributes->merge(['class' => 'mt-[2px] w-[18px] h-[18px] rounded-[6px] border-[1.5px] border-celeste-border bg-card appearance-none checked:bg-celeste checked:border-celeste cursor-pointer flex-none']) }}>
