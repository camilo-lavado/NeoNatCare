@php
    $moodIcons = [
        'exhausted' => 'sentiment_very_dissatisfied',
        'low' => 'sentiment_dissatisfied',
        'normal' => 'sentiment_neutral',
        'good' => 'sentiment_satisfied',
        'energetic' => 'sentiment_very_satisfied',
    ];
    $moodLabels = [
        'exhausted' => 'Agotada',
        'low' => 'Baja',
        'normal' => 'Normal',
        'good' => 'Bien',
        'energetic' => 'Con energía',
    ];
    $sleepLabels = ['lt4' => '< 4h', '4-6' => '4–6h', '6-8' => '6–8h', '8+' => '+8h'];
@endphp

<x-layout page="mood-log" title="¿Cómo va tu día? — CuidarIA">
    <div class="flex items-center gap-3">
        <a href="{{ route('dashboard') }}" class="ms text-[22px] text-ink-2">arrow_back_ios_new</a>
        <h1 class="flex-1 font-heading font-bold text-[19px] leading-[1.2] text-ink m-0">¿Cómo va tu día?</h1>
    </div>
    <p class="text-base leading-[1.5] text-ink-2">Solo toma 30 segundos. Nadie más lo ve, es para ti.</p>

    <form method="POST" action="{{ route('mood-log.store') }}" class="flex flex-col gap-5">
        @csrf
        <x-mood-log />

        <div class="flex flex-col gap-[7px]">
            <label for="note" class="text-[13px] font-bold text-ink">¿Quieres contarme algo más? <span class="font-semibold text-ink-2">(opcional)</span></label>
            <textarea id="note" name="note" rows="3"
                class="bg-card border border-celeste-border rounded-[18px] px-4 py-[14px] text-[14.5px] text-ink-2 min-h-[64px] w-full resize-y outline-none"
                placeholder="Hoy Lucas lloró mucho en la tarde y me sentí sobrepasada…">{{ old('note') }}</textarea>
        </div>

        <x-btn type="submit" variant="primary" class="mt-auto">
            <span class="ms text-[19px]">check</span>Listo por hoy
        </x-btn>
    </form>

    @if ($logs->isNotEmpty())
        <div>
            <div class="text-[13px] font-bold text-ink mb-[10px]">Tus últimos registros</div>
            <div class="bg-card border border-celeste-border rounded-card py-[6px] px-1">
                @foreach ($logs as $log)
                    <x-list-tile
                        :icon="$moodIcons[$log->mood] ?? 'sentiment_neutral'"
                        :title="($moodLabels[$log->mood] ?? $log->mood).' · '.($sleepLabels[$log->sleep_hours] ?? $log->sleep_hours).' de sueño'"
                        :subtitle="$log->created_at->translatedFormat('d M, H:i')"
                    >
                        <form method="POST" action="{{ route('mood-log.destroy', $log) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ms text-[19px] text-ink-2 bg-transparent border-none" aria-label="Eliminar registro">delete</button>
                        </form>
                    </x-list-tile>
                    @if (! $loop->last)
                        <hr class="h-px bg-celeste-border border-none mx-[13px]">
                    @endif
                @endforeach
            </div>
        </div>
    @endif
</x-layout>
