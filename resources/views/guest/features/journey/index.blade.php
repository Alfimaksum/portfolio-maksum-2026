@php
    $dbPhases = $experiences->pluck('phase')->unique()->filter()->values();

    // Data default perjalanan akademik dan organisasi jika tabel database masih kosong
    $fallbackExperiences = collect([
        (object)[
            'title' => 'D-IV Sistem Informasi Bisnis',
            'institution' => 'Politeknik Negeri Malang (Polinema)',
            'type' => 'Pendidikan',
            'phase' => 'Polinema',
            'start_date' => '2023-08-01',
            'end_date' => null,
            'description' => 'Mendalami arsitektur aplikasi enterprise, rekayasa perangkat lunak web (Laravel) & mobile (Flutter), manajemen basis data relasional, serta analisis sistem bisnis.',
            'skills_gained' => ['Laravel', 'PostgreSQL', 'Analisis Sistem', 'Flutter', 'UI/UX Design'],
        ],
        (object)[
            'title' => 'Departemen Riset & Teknologi',
            'institution' => 'Himpunan Mahasiswa Teknologi Informasi (HMTI)',
            'type' => 'Organisasi',
            'phase' => 'HMTI/Organisasi',
            'start_date' => '2023-11-01',
            'end_date' => null,
            'description' => 'Mengembangkan inisiatif workshop pemrograman, kolaborasi pengembangan aplikasi internal, serta mentoring teknis bagi mahasiswa.',
            'skills_gained' => ['Kepemimpinan Teknis', 'Manajemen Event', 'Kerja Sama Tim', 'Problem Solving'],
        ],
        (object)[
            'title' => 'Teknik Komputer & Jaringan (TKJ)',
            'institution' => 'SMK Telkom Malang',
            'type' => 'Pendidikan',
            'phase' => 'SMK Telkom',
            'start_date' => '2020-07-01',
            'end_date' => '2023-06-30',
            'description' => 'Fondasi mendalam dalam protokol jaringan telekomunikasi TCP/IP, administrasi server Linux, konfigurasi routing, dan dasar pemrograman web.',
            'skills_gained' => ['Cisco & MikroTik', 'Linux Server', 'Keamanan Jaringan', 'Routing & Switching'],
        ],
    ]);

    $timelineItems = $experiences->isNotEmpty() ? $experiences : $fallbackExperiences;
@endphp

<section id="journey" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative">
    <!-- Section Header (Editorial Style) -->
    <div class="text-center max-w-2xl mx-auto mb-16">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/80 backdrop-blur-md border border-blue-200 text-blue-700 font-mono text-xs uppercase tracking-wider font-semibold mb-4 shadow-sm shadow-blue-500/5">
            <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
            <span>Pendidikan, Dedikasi & Pengalaman</span>
        </div>
        <h2 class="font-display font-extrabold text-3xl sm:text-5xl text-slate-900 tracking-tight leading-tight">
            Perjalanan <span class="blue-gradient-text">Akademik & Profesional</span>
        </h2>
        <p class="text-slate-600 mt-4 text-base sm:text-lg leading-relaxed">
            Rekam jejak studi formal di Politeknik Negeri Malang & SMK Telkom, serta kepemimpinan di organisasi teknologi informasi.
        </p>
    </div>

    <!-- Alpine.js Timeline Tab System Container -->
    <div x-data="{ activePhase: 'all' }" class="max-w-4xl mx-auto">
        <!-- Tab Pills Partial -->
        @include('guest.features.journey.phase-tab', ['phases' => $dbPhases])

        <!-- Vertical Timeline Path -->
        <div class="relative pl-6 sm:pl-8 border-l-2 border-blue-200/80 space-y-8 sm:space-y-10 my-6">
            @foreach($timelineItems as $exp)
                @php
                    $phaseVal = $exp->phase ?? '';
                    $matchCondition = "activePhase === 'all' || activePhase === '{$phaseVal}' || (activePhase === 'SMK Telkom' && '{$phaseVal}'.includes('SMK')) || (activePhase === 'HMTI/Organisasi' && ('{$phaseVal}'.includes('HMTI') || '{$phaseVal}'.includes('Organis') || '{$exp->type}' === 'Organisasi' || '{$exp->type}' === 'Organization'))";
                @endphp

                <div 
                    x-show="{{ $matchCondition }}"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-3"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="relative group"
                >
                    <!-- Timeline Node Bullet -->
                    <span class="absolute -left-[31px] sm:-left-[39px] top-3 w-4 h-4 rounded-full bg-white border-2 border-blue-600 group-hover:scale-125 group-hover:bg-blue-600 transition duration-200 shadow-md shadow-blue-500/20"></span>

                    <!-- Frosted Glass Timeline Card -->
                    <div class="rounded-[2rem] bg-white/75 backdrop-blur-xl border border-white/85 hover:border-blue-400/80 p-6 sm:p-8 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-blue-500/15 hover:-translate-y-1 transition duration-200">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-3">
                            <div>
                                <h3 class="font-display font-extrabold text-xl text-slate-900 group-hover:text-blue-600 transition duration-200">
                                    {{ $exp->title }}
                                </h3>
                                <p class="text-sm font-semibold text-slate-600 flex items-center gap-1.5 mt-1">
                                    <svg class="w-4 h-4 text-blue-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    <span>{{ $exp->institution }}</span>
                                </p>
                            </div>

                            <div class="flex items-center gap-2">
                                <span class="px-3 py-1 rounded-full text-xs font-mono font-semibold bg-white/90 backdrop-blur-md text-blue-700 border border-blue-200/80 shadow-sm">
                                    {{ $exp->type }}
                                </span>
                                <span class="text-xs font-mono font-bold text-slate-500 bg-slate-50/80 px-3 py-1 rounded-full border border-slate-200">
                                    {{ $exp->start_date ? \Carbon\Carbon::parse($exp->start_date)->format('M Y') : 'Mulai' }} — 
                                    {{ $exp->end_date ? \Carbon\Carbon::parse($exp->end_date)->format('M Y') : 'Sekarang' }}
                                </span>
                            </div>
                        </div>

                        @if(!empty($exp->description))
                            <p class="text-slate-600 text-sm sm:text-base leading-relaxed mt-3">
                                {{ $exp->description }}
                            </p>
                        @endif

                        <!-- Skills Gained Pills -->
                        @if(is_array($exp->skills_gained) && count($exp->skills_gained) > 0)
                            <div class="mt-4 pt-3 border-t border-slate-100 flex flex-wrap gap-1.5 items-center">
                                <span class="text-xs text-blue-600 font-mono font-bold mr-1">Kompetensi Utama:</span>
                                @foreach($exp->skills_gained as $skillGained)
                                    <x-badges.tech-pill :name="$skillGained" />
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
