@props([
    'category' => 'Teknologi',
    'skills' => [],
    'icon' => null,
])

<!-- High-End Frosted Glass Skill Card (Inspired by Inspirasi 3 & 6) -->
<div class="rounded-[2rem] bg-white/75 backdrop-blur-xl border border-white/85 hover:border-blue-400/80 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-blue-500/15 p-6 sm:p-7 transition-all duration-300 hover:-translate-y-1.5 group flex flex-col justify-between relative overflow-hidden">
    <!-- Ambient Soft Glow -->
    <div class="absolute -top-20 -right-20 w-48 h-48 bg-blue-100/30 rounded-full blur-2xl pointer-events-none"></div>

    <div class="relative z-10">
        <!-- Card Header with Indicator -->
        <div class="flex items-center justify-between pb-4 mb-5 border-b border-slate-100">
            <div class="flex items-center gap-2.5">
                @if($icon)
                    <div class="text-blue-600">
                        {!! $icon !!}
                    </div>
                @else
                    <span class="w-2.5 h-2.5 rounded-full bg-blue-600 group-hover:scale-125 transition duration-200 shadow-sm shadow-blue-500/40"></span>
                @endif
                <h3 class="font-display font-extrabold text-lg text-slate-900 group-hover:text-blue-600 transition duration-200">
                    {{ $category }}
                </h3>
            </div>
            <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-white/90 backdrop-blur-md text-blue-700 border border-blue-200/80 shadow-sm">
                {{ count($skills) }} alat
            </span>
        </div>

        <!-- Skills Grid inside Category (Glass Pills) -->
        <div class="grid grid-cols-2 gap-2.5">
            @foreach($skills as $skill)
                <div class="flex items-center gap-2.5 p-3 rounded-2xl bg-white/70 backdrop-blur-md border border-white/90 hover:bg-blue-50/80 hover:border-blue-300 text-slate-700 transition duration-200 shadow-sm hover:shadow-md">
                    @if(is_object($skill) && !empty($skill->icon_path))
                        <img src="{{ asset('storage/' . $skill->icon_path) }}" alt="{{ $skill->name }}" class="w-4 h-4 object-contain shrink-0">
                    @else
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500 shrink-0"></span>
                    @endif
                    <span class="text-xs font-semibold text-slate-700 truncate">
                        {{ is_object($skill) ? $skill->name : $skill }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
</div>
