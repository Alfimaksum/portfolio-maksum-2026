@props([
    'phases' => [],
])

@php
    $curatedTabs = [
        'all' => 'Semua Jejak',
        'Polinema' => 'Polinema',
        'SMK Telkom' => 'SMK Telkom',
        'HMTI/Organisasi' => 'Organisasi / HMTI',
    ];

    // Gabungkan fase lain yang terdaftar pada database
    foreach($phases as $p) {
        if(!isset($curatedTabs[$p]) && !empty($p)) {
            $curatedTabs[$p] = $p;
        }
    }
@endphp

<div class="flex flex-wrap items-center justify-center gap-2 pb-6">
    @foreach($curatedTabs as $tabKey => $tabLabel)
        <button 
            type="button"
            @click="activePhase = '{{ $tabKey }}'"
            :class="activePhase === '{{ $tabKey }}' 
                ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-500/25 scale-105' 
                : 'bg-white text-slate-600 hover:text-slate-900 hover:bg-slate-50 border border-slate-200 shadow-sm'"
            class="px-4 py-2 rounded-xl text-xs sm:text-sm font-medium transition duration-200 focus:outline-none"
        >
            {{ $tabLabel }}
        </button>
    @endforeach
</div>
