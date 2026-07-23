<x-layout :page="$pageKey" :title="$pageTitle.' — CuidarIA'">
    <x-slot:topbar>
        <x-topbar :title="$pageTitle" back="javascript:history.back()" />
    </x-slot:topbar>

    @yield('content')
</x-layout>
