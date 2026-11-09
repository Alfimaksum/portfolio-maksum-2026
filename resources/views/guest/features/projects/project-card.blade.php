@props([
    'project',
    'indexNumber' => '01',
    'isWide' => false,
])

@php
    $cat = strtolower($project->category ?? '');
    $isVisualMedia = in_array($project->category, ['Graphic Design', 'Photography']) 
        || str_contains($cat, 'design') 
        || str_contains($cat, 'photo') 
        || str_contains($cat, 'apparel') 
        || str_contains($cat, 'brand');

    $galleryImages = is_array($project->gallery_images) ? array_filter($project->gallery_images) : [];
    $techStack = (is_array($project->tech_stack) && count($project->tech_stack) > 0) ? $project->tech_stack : [];
@endphp

@if($isVisualMedia)
    <!-- ================= BENTO BOX VISUAL SHOWCASE (Graphic Design & Photography) ================= -->
    <div class="h-full rounded-[2rem] bg-white/75 backdrop-blur-xl border border-white/85 hover:border-blue-400/80 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-blue-500/15 p-6 sm:p-7 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1.5 group relative overflow-hidden">
        
        <!-- Subtle Frosted Glass Shine Reflection -->
        <div class="absolute -top-24 -right-24 w-60 h-60 bg-blue-100/30 rounded-full blur-2xl pointer-events-none"></div>

        <div class="space-y-5 relative z-10">
            <!-- Top Bento Header Row (Index Number & Category Tag) -->
            <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <span class="text-xs font-mono font-bold text-blue-600/90 tracking-widest uppercase">
                        // {{ $indexNumber }}
                    </span>
                    @if($project->is_featured)
                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-blue-600 text-white flex items-center gap-1 shadow-sm">
                            ★ Unggulan
                        </span>
                    @endif
                </div>
                <span class="px-3 py-1 rounded-full text-xs font-mono font-semibold bg-white/90 backdrop-blur-md text-blue-700 border border-blue-200/80 shadow-sm">
                    {{ $project->category }}
                </span>
            </div>

            <!-- Primary Thumbnail Container (High Quality Rounded Display) -->
            <div class="relative {{ $isWide ? 'h-64 sm:h-72' : 'h-52 sm:h-60' }} w-full rounded-2xl bg-slate-100 overflow-hidden border border-white/90 shadow-sm group-hover:shadow-md transition duration-300">
                @if($project->thumbnail_path)
                    <img 
                        src="{{ asset('storage/' . $project->thumbnail_path) }}" 
                        alt="{{ $project->title }}" 
                        class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                    >
                @else
                    <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-tr from-blue-50 via-sky-50 to-indigo-50 p-6 text-center">
                        <span class="text-4xl mb-2">🎨</span>
                        <span class="font-display font-bold text-lg text-slate-800">{{ $project->title }}</span>
                        <span class="text-xs text-blue-600 font-mono mt-1 font-semibold">{{ $project->category }}</span>
                    </div>
                @endif
            </div>

            <!-- Bento Mini Gallery Strip (Inspired by Inspirasi 1, 4, 6) -->
            @if(count($galleryImages) > 0)
                <div class="space-y-2">
                    <div class="flex items-center justify-between text-[11px] font-mono uppercase tracking-wider text-slate-500 font-bold">
                        <span>Galeri Karya Terlampir</span>
                        <span class="text-blue-600 font-semibold">{{ count($galleryImages) }} foto</span>
                    </div>
                    <div class="flex gap-2.5 overflow-x-auto pb-1 scrollbar-thin">
                        @foreach($galleryImages as $galleryImg)
                            <div class="relative w-16 h-16 sm:w-20 sm:h-20 rounded-xl bg-slate-100 overflow-hidden border border-white/80 shrink-0 group/img shadow-sm hover:scale-105 transition duration-200">
                                <img 
                                    src="{{ asset('storage/' . $galleryImg) }}" 
                                    alt="Detail karya" 
                                    class="w-full h-full object-cover"
                                >
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Body Description & Role -->
            <div class="space-y-2">
                <p class="text-xs font-mono text-blue-600 font-bold tracking-tight">Peran: {{ $project->role }}</p>
                <h4 class="font-display font-extrabold text-xl text-slate-900 group-hover:text-blue-600 transition duration-200 leading-snug">
                    {{ $project->title }}
                </h4>
                <p class="text-slate-600 text-sm leading-relaxed line-clamp-3">
                    {{ $project->short_description }}
                </p>
            </div>
        </div>

        <!-- Bottom Action Strip -->
        <div class="pt-4 mt-4 border-t border-slate-100 flex items-center justify-between relative z-10">
            <span class="text-xs text-slate-400 font-mono font-medium">Koleksi Visual</span>
            @if($project->demo_url)
                <a 
                    href="{{ $project->demo_url }}" 
                    target="_blank" 
                    rel="noopener noreferrer"
                    class="inline-flex items-center gap-2 text-xs font-bold px-4 py-2 rounded-xl bg-blue-50 hover:bg-blue-600 text-blue-700 hover:text-white border border-blue-200/80 hover:border-blue-600 shadow-sm transition-all duration-200"
                >
                    <span>Buka Galeri</span>
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            @else
                <span class="text-xs text-slate-400 font-mono">Arsip Desain</span>
            @endif
        </div>
    </div>

@else
    <!-- ================= BENTO BOX TECH CARD (Web Development, Mobile App) ================= -->
    <div class="h-full rounded-[2rem] bg-white/75 backdrop-blur-xl border border-white/85 hover:border-blue-400/80 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-blue-500/15 p-6 sm:p-7 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1.5 group relative overflow-hidden">
        
        <!-- Subtle Frosted Glass Reflection -->
        <div class="absolute -top-24 -right-24 w-60 h-60 bg-indigo-100/30 rounded-full blur-2xl pointer-events-none"></div>

        <div class="space-y-5 relative z-10">
            <!-- Top Bento Header Row (Index Number & Category Tag) -->
            <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <span class="text-xs font-mono font-bold text-blue-600/90 tracking-widest uppercase">
                        // {{ $indexNumber }}
                    </span>
                    @if($project->is_featured)
                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-blue-600 text-white flex items-center gap-1 shadow-sm">
                            ★ Unggulan
                        </span>
                    @endif
                </div>
                <span class="px-3 py-1 rounded-full text-xs font-mono font-semibold bg-white/90 backdrop-blur-md text-blue-700 border border-blue-200/80 shadow-sm">
                    {{ $project->category }}
                </span>
            </div>

            <!-- Thumbnail Container -->
            <div class="relative {{ $isWide ? 'h-56 sm:h-64' : 'h-48' }} w-full rounded-2xl bg-slate-100 overflow-hidden border border-white/90 shadow-sm group-hover:shadow-md transition duration-300">
                @if($project->thumbnail_path)
                    <img 
                        src="{{ asset('storage/' . $project->thumbnail_path) }}" 
                        alt="{{ $project->title }}" 
                        class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                    >
                @else
                    <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-tr from-slate-100 via-blue-50 to-indigo-50 p-6 text-center">
                        <span class="font-display font-extrabold text-xl text-blue-800">{{ $project->title }}</span>
                        <span class="text-xs text-blue-600 font-mono mt-1 font-semibold">{{ $project->category }}</span>
                    </div>
                @endif
            </div>

            <!-- Body Information -->
            <div class="space-y-2">
                <p class="text-xs font-mono text-blue-600 font-bold tracking-tight">Peran: {{ $project->role }}</p>
                <h4 class="font-display font-extrabold text-xl text-slate-900 group-hover:text-blue-600 transition duration-200 leading-snug">
                    {{ $project->title }}
                </h4>
                <p class="text-slate-600 text-sm leading-relaxed line-clamp-3">
                    {{ $project->short_description }}
                </p>
            </div>

            <!-- Tech Stack Tags in Bento Pills -->
            @if(count($techStack) > 0)
                <div class="flex flex-wrap gap-1.5 pt-1">
                    @foreach($techStack as $tech)
                        <x-badges.tech-pill :name="$tech" />
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Action Buttons Strip -->
        <div class="pt-4 mt-4 border-t border-slate-100 flex items-center gap-3 relative z-10">
            @if($project->demo_url)
                <a 
                    href="{{ $project->demo_url }}" 
                    target="_blank" 
                    rel="noopener noreferrer"
                    class="inline-flex items-center gap-1.5 text-xs font-bold px-4 py-2.5 rounded-xl bg-blue-600 text-white hover:bg-blue-700 shadow-sm shadow-blue-500/30 hover:-translate-y-0.5 transition duration-200"
                >
                    <span>Uji Demo</span>
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            @endif

            @if($project->github_url)
                <a 
                    href="{{ $project->github_url }}" 
                    target="_blank" 
                    rel="noopener noreferrer"
                    class="inline-flex items-center gap-1.5 text-xs font-semibold px-4 py-2.5 rounded-xl bg-white/90 hover:bg-white text-slate-700 border border-slate-200 hover:border-blue-400 hover:text-blue-600 hover:-translate-y-0.5 transition duration-200 shadow-sm"
                >
                    <svg class="w-3.5 h-3.5 fill-currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/>
                    </svg>
                    <span>Kode</span>
                </a>
            @endif
        </div>
    </div>
@endif
