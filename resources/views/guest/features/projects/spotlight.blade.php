@props([
    'project' => null,
])

@php
    $title = $project?->title ?? 'FitCore — Sistem Manajemen Kebugaran & Pelatihan Cerdas';
    $role = $project?->role ?? 'Lead Full Stack Architect';
    $desc = $project?->short_description ?? 'Platform analitik kebugaran dan pelacakan latihan komprehensif dengan penjadwalan otomatis, analitik beban progresif, dan pelacakan nutrisi cerdas yang dibangun menggunakan arsitektur Laravel performa tinggi serta antarmuka responsif.';
    $techStack = (is_array($project?->tech_stack) && count($project->tech_stack) > 0) 
        ? $project->tech_stack 
        : ['Laravel 13', 'PostgreSQL', 'Filament v3', 'Tailwind CSS', 'Alpine.js', 'Chart.js', 'REST API'];
    $galleryImages = is_array($project?->gallery_images) ? array_filter($project->gallery_images) : [];
    $githubUrl = $project?->github_url ?? 'https://github.com';
    $demoUrl = $project?->demo_url ?? null;
    $thumbnail = $project?->thumbnail_path ? asset('storage/' . $project->thumbnail_path) : null;

    $cat = strtolower($project?->category ?? '');
    $isVisualMedia = in_array($project?->category, ['Graphic Design', 'Photography']) 
        || str_contains($cat, 'design') 
        || str_contains($cat, 'photo') 
        || str_contains($cat, 'apparel') 
        || str_contains($cat, 'brand');
@endphp

<!-- Giant Frosted Glass Spotlight Card (Inspired by Inspirasi 4, 5, 7) -->
<div class="mb-12 rounded-[2.5rem] bg-white/75 backdrop-blur-2xl border border-white/90 p-7 sm:p-12 shadow-2xl shadow-blue-500/10 hover:shadow-blue-500/15 hover:border-blue-300/80 transition-all duration-300 relative overflow-hidden group">
    <!-- Ambient Blue Light Gradient Aura -->
    <div class="absolute -top-32 -right-32 w-96 h-96 bg-gradient-to-br from-blue-400/15 via-sky-300/10 to-transparent rounded-full blur-3xl pointer-events-none"></div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center relative z-10">
        <!-- Content Column (7 cols) -->
        <div class="lg:col-span-7 space-y-6">
            <!-- Header Badges & Indicator -->
            <div class="flex flex-wrap items-center gap-3">
                <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-blue-600 text-white shadow-md shadow-blue-500/25">
                    <span>★</span> Sorotan Utama
                </span>
                <span class="px-3.5 py-1 rounded-full text-xs font-mono font-semibold bg-white/80 backdrop-blur-md text-blue-700 border border-blue-200/80 shadow-sm">
                    {{ $project?->category ?? 'Aplikasi Web & Mobile' }}
                </span>
                <span class="text-xs font-mono font-bold text-slate-400">
                    // 00 SPOTLIGHT
                </span>
            </div>

            <!-- Title with Tight Editorial Tracking -->
            <h3 class="font-display font-extrabold text-2xl sm:text-4xl lg:text-5xl text-slate-900 tracking-tight leading-tight group-hover:text-blue-600 transition duration-200">
                {{ $title }}
            </h3>

            <!-- Role Indicator -->
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-xl bg-blue-50/70 border border-blue-100 text-blue-700 text-xs sm:text-sm font-mono font-semibold">
                <span>Peran:</span>
                <span class="font-bold">{{ $role }}</span>
            </div>

            <!-- Narrative Description -->
            <p class="text-slate-600 text-base sm:text-lg leading-relaxed">
                {{ $desc }}
            </p>

            @if($isVisualMedia)
                <!-- Visual Gallery Preview Strip for Design / Photo Spotlight -->
                @if(count($galleryImages) > 0)
                    <div class="pt-2">
                        <p class="text-xs font-mono text-slate-500 font-bold uppercase tracking-wider mb-2.5">Koleksi Galeri Karya ({{ count($galleryImages) }} foto)</p>
                        <div class="flex gap-3 overflow-x-auto pb-2 scrollbar-thin">
                            @foreach($galleryImages as $img)
                                <div class="w-24 h-24 rounded-2xl overflow-hidden bg-slate-100 border border-white/80 shrink-0 shadow-md hover:scale-105 transition duration-300">
                                    <img src="{{ asset('storage/' . $img) }}" alt="Pratinjau Karya" class="w-full h-full object-cover">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @else
                <!-- Tech Stack Badges for Web / Mobile -->
                <div class="flex flex-wrap gap-2 pt-2">
                    @foreach($techStack as $tech)
                        <x-badges.tech-pill :name="$tech" />
                    @endforeach
                </div>
            @endif

            <!-- Action CTAs -->
            <div class="pt-4 flex flex-wrap items-center gap-4">
                @if($demoUrl)
                    <x-buttons.primary-gold href="{{ $demoUrl }}" target="_blank">
                        <span>{{ $isVisualMedia ? 'Buka Portofolio' : 'Uji Coba Demo' }}</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </x-buttons.primary-gold>
                @endif

                @if(!$isVisualMedia && $githubUrl)
                    <a 
                        href="{{ $githubUrl }}" 
                        target="_blank" 
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 px-5 py-3.5 rounded-xl text-sm font-semibold text-slate-700 bg-white/90 backdrop-blur-md hover:bg-white border border-slate-200 hover:border-blue-400 hover:text-blue-600 hover:-translate-y-0.5 transition duration-200 shadow-sm"
                    >
                        <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/>
                        </svg>
                        <span>Repositori GitHub</span>
                    </a>
                @endif
            </div>
        </div>

        <!-- Visual / Graphic Preview Column (5 cols) -->
        <div class="lg:col-span-5">
            <div class="relative rounded-[2rem] overflow-hidden bg-slate-100/80 border border-white/90 shadow-xl shadow-blue-500/10 aspect-[16/11] flex items-center justify-center p-2 group-hover:scale-[1.02] transition duration-500">
                @if($thumbnail)
                    <img src="{{ $thumbnail }}" alt="{{ $title }}" class="w-full h-full object-cover rounded-2xl group-hover:scale-105 transition duration-500">
                @else
                    <div class="w-full h-full rounded-2xl bg-gradient-to-tr from-blue-600 via-indigo-600 to-sky-500 p-8 flex flex-col items-center justify-center text-center text-white shadow-inner">
                        <div class="w-20 h-20 rounded-2xl bg-white/20 backdrop-blur-md text-white flex items-center justify-center font-display font-extrabold text-3xl mb-3 shadow-lg border border-white/30">
                            FC
                        </div>
                        <p class="font-display font-bold text-2xl tracking-tight">Arsitektur FitCore</p>
                        <p class="text-xs text-blue-100 font-mono mt-1 font-semibold uppercase tracking-wider">Enterprise Wellness Engine</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
