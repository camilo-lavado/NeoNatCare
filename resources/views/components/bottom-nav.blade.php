@props(['active' => null])

@php
    $items = [
        ['key' => 'dashboard', 'icon' => 'home', 'label' => 'Inicio', 'route' => 'dashboard'],
        ['key' => 'wellbeing', 'icon' => 'favorite', 'label' => 'Bienestar', 'route' => 'wellbeing'],
        ['key' => 'chat', 'icon' => 'forum', 'label' => 'Chat', 'route' => 'chat'],
        ['key' => 'profile', 'icon' => 'person', 'label' => 'Perfil', 'route' => 'profile.index'],
    ];
@endphp

<nav class="fixed left-1/2 -translate-x-1/2 bottom-0 w-full max-w-[480px] bg-card border-t border-celeste-border flex justify-around px-[10px] pt-3 pb-[22px]">
    @foreach ($items as $item)
        @php $isActive = $active === $item['key']; @endphp
        <a href="{{ route($item['route']) }}"
           data-nav="{{ $item['key'] }}"
           class="text-center flex flex-col items-center gap-[3px] {{ $isActive ? 'text-celeste' : 'text-ink-2' }}">
            <span class="ms text-2xl">{{ $item['icon'] }}</span>
            <span class="text-[11.5px] leading-none {{ $isActive ? 'font-bold' : 'font-semibold' }}">{{ $item['label'] }}</span>
        </a>
    @endforeach
</nav>
