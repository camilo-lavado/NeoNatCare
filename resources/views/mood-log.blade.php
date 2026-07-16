<x-layout page="mood-log" title="¿Cómo va tu día? — CuidarIA">
    <div class="flex items-center gap-3">
        <a href="{{ route('dashboard') }}" class="ms text-[22px] text-ink-2">arrow_back_ios_new</a>
        <h1 class="flex-1 font-heading font-bold text-[19px] leading-[1.2] text-ink m-0">¿Cómo va tu día?</h1>
    </div>
    <p class="text-base leading-[1.5] text-ink-2">Solo toma 30 segundos. Nadie más lo ve, es para ti.</p>

    <form data-redirect="{{ route('dashboard') }}" class="flex flex-col gap-5">
        <x-mood-log />

        <div class="flex flex-col gap-[7px]">
            <label for="note" class="text-[13px] font-bold text-ink">¿Quieres contarme algo más? <span class="font-semibold text-ink-2">(opcional)</span></label>
            <textarea id="note" name="note" rows="3"
                class="bg-card border border-celeste-border rounded-[18px] px-4 py-[14px] text-[14.5px] text-ink-2 min-h-[64px] w-full resize-y outline-none"
                placeholder="Hoy Lucas lloró mucho en la tarde y me sentí sobrepasada…"></textarea>
        </div>

        <x-btn type="submit" variant="primary" class="mt-auto">
            <span class="ms text-[19px]">check</span>Listo por hoy
        </x-btn>
    </form>
</x-layout>
