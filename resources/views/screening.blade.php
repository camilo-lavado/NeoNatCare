<x-layout page="screening" title="Tamizaje breve — CuidarIA">
    <form method="POST" action="{{ route('screening.store') }}" data-screening-form class="contents">
        @csrf
        <x-screening-question :exit-route="route('dashboard')" />
    </form>
</x-layout>
