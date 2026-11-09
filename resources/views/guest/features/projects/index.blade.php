@php
    $featuredProject = $projects->firstWhere('is_featured', true) ?? $projects->first();
    $otherProjects = $featuredProject 
        ? $projects->reject(fn($p) => $p->id === $featuredProject->id)->values() 
        : $projects->values();
@endphp

<section id="projects" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative">
    <!-- Section Header (Editorial Style) -->
    <div class="text-center max-w-3xl mx-auto mb-16">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/80 backdrop-blur-md border border-blue-200 text-blue-700 font-mono text-xs uppercase tracking-wider font-semibold mb-4 shadow-sm shadow-blue-500/5">
            <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
            <span>Karya Terpilih & Eksplorasi Digital</span>
        </div>
        <h2 class="font-display font-extrabold text-3xl sm:text-5xl text-slate-900 tracking-tight leading-tight">
            Portofolio Rekayasa & <span class="blue-gradient-text">Kreativitas Visual</span>
        </h2>
        <p class="text-slate-600 mt-4 text-base sm:text-lg leading-relaxed">
            Kombinasi sistem web modern performa tinggi, aplikasi mobile, identitas merek, desain grafis apparel, dan fotografi editorial.
        </p>
    </div>

    <!-- Featured Spotlight Project (Giant Frosted Glass Hero Card) -->
    @if($featuredProject)
        @include('guest.features.projects.spotlight', ['project' => $featuredProject])
    @endif

    <!-- Asymmetric Bento Box Grid (Inspired by Inspirasi 1, 4, 5, 7) -->
    @if($otherProjects->isNotEmpty())
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
            @foreach($otherProjects as $index => $project)
                @php
                    // Asymmetric Bento Grid alternation (7+5, 5+7)
                    $mod = $index % 4;
                    $spanClass = match($mod) {
                        0 => 'col-span-12 lg:col-span-7',
                        1 => 'col-span-12 lg:col-span-5',
                        2 => 'col-span-12 lg:col-span-5',
                        3 => 'col-span-12 lg:col-span-7',
                        default => 'col-span-12 lg:col-span-6',
                    };
                    $projectIndex = sprintf('%02d', $index + 1);
                    $isWide = in_array($mod, [0, 3]);
                @endphp
                <div class="{{ $spanClass }} flex flex-col">
                    @include('guest.features.projects.project-card', [
                        'project' => $project,
                        'indexNumber' => $projectIndex,
                        'isWide' => $isWide,
                    ])
                </div>
            @endforeach
        </div>
    @elseif(!$featuredProject && $projects->isEmpty())
        <div class="p-12 text-center bg-white/70 backdrop-blur-xl border border-dashed border-slate-300 rounded-3xl text-slate-500 shadow-sm">
            <p class="text-lg">Siap meluncurkan karya baru. Tambahkan portofolio Anda melalui <a href="{{ url('/admin/projects') }}" class="text-blue-600 underline font-semibold">Panel Admin</a>.</p>
        </div>
    @endif
</section>
