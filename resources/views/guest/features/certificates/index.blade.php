@php
    $fallbackCerts = collect([
        (object)[
            'title' => 'AWS Academy Graduate — Cloud Foundations',
            'issuer' => 'Amazon Web Services (AWS)',
            'issue_date' => '2024-06-15',
            'image_path' => null,
            'credential_url' => 'https://aws.amazon.com',
        ],
        (object)[
            'title' => 'Belajar Dasar Pemrograman JavaScript & Web',
            'issuer' => 'Dicoding Indonesia',
            'issue_date' => '2023-09-10',
            'image_path' => null,
            'credential_url' => 'https://dicoding.com',
        ],
        (object)[
            'title' => 'CCNA: Introduction to Networks',
            'issuer' => 'Cisco Networking Academy',
            'issue_date' => '2022-12-05',
            'image_path' => null,
            'credential_url' => 'https://netacad.com',
        ],
    ]);

    $certList = (isset($certificates) && $certificates->isNotEmpty()) ? $certificates : $fallbackCerts;
@endphp

<section id="certificates" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative">
    <!-- Section Header (Editorial Style) -->
    <div class="text-center max-w-2xl mx-auto mb-16">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/80 backdrop-blur-md border border-blue-200 text-blue-700 font-mono text-xs uppercase tracking-wider font-semibold mb-4 shadow-sm shadow-blue-500/5">
            <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
            <span>Kredensial & Validasi Resmi</span>
        </div>
        <h2 class="font-display font-extrabold text-3xl sm:text-5xl text-slate-900 tracking-tight leading-tight">
            Lisensi & <span class="blue-gradient-text">Sertifikasi Industri</span>
        </h2>
        <p class="text-slate-600 mt-4 text-base sm:text-lg leading-relaxed">
            Standarisasi kompetensi di bidang rekayasa web, cloud architecture, serta administrasi jaringan telekomunikasi.
        </p>
    </div>

    <!-- Certificate Cards Grid (High-End Glassmorphism) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
        @foreach($certList as $index => $cert)
            @php
                $certNum = sprintf('%02d', $index + 1);
            @endphp
            <div class="rounded-[2rem] bg-white/75 backdrop-blur-xl border border-white/85 hover:border-blue-400/80 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-blue-500/15 p-6 sm:p-7 flex flex-col justify-between hover:-translate-y-1.5 transition-all duration-300 group relative overflow-hidden">
                <!-- Ambient Subtle Glow -->
                <div class="absolute -top-20 -right-20 w-48 h-48 bg-sky-100/30 rounded-full blur-2xl pointer-events-none"></div>

                <div class="space-y-4 relative z-10">
                    <!-- Top Index & Issuer Pill -->
                    <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                        <span class="text-xs font-mono font-bold text-blue-600/90 tracking-widest uppercase">
                            // {{ $certNum }}
                        </span>
                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-mono font-bold bg-blue-50 text-blue-700 border border-blue-200/80">
                            Terverifikasi
                        </span>
                    </div>

                    @if(!empty($cert->image_path))
                        <div class="h-44 w-full rounded-2xl bg-slate-50 overflow-hidden border border-white/90 shadow-inner">
                            <img src="{{ asset('storage/' . $cert->image_path) }}" alt="{{ $cert->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                    @else
                        <div class="h-32 w-full rounded-2xl bg-gradient-to-tr from-blue-50 via-sky-50 to-indigo-50 border border-white/90 flex items-center justify-center p-4 text-center shadow-inner">
                            <div class="w-12 h-12 rounded-2xl bg-white/80 backdrop-blur-md text-blue-600 flex items-center justify-center font-display font-bold text-2xl shadow-sm border border-blue-100">
                                🏅
                            </div>
                        </div>
                    @endif

                    <div>
                        <h3 class="font-display font-extrabold text-lg text-slate-900 group-hover:text-blue-600 transition duration-200 leading-snug">
                            {{ $cert->title }}
                        </h3>
                        <p class="text-sm text-slate-600 mt-1 font-medium">
                            Penerbit: <span class="text-blue-600 font-semibold">{{ $cert->issuer }}</span>
                        </p>
                        @if(!empty($cert->issue_date))
                            <p class="text-xs font-mono text-slate-400 mt-1">
                                Waktu Terbit: {{ \Carbon\Carbon::parse($cert->issue_date)->translatedFormat('F Y') }}
                            </p>
                        @endif
                    </div>
                </div>

                @if(!empty($cert->credential_url))
                    <div class="mt-5 pt-3 border-t border-slate-100 relative z-10 flex items-center justify-between">
                        <span class="text-xs text-slate-400 font-mono">Status Kredensial</span>
                        <a 
                            href="{{ $cert->credential_url }}" 
                            target="_blank" 
                            rel="noopener noreferrer" 
                            class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-600 hover:text-blue-700 transition duration-200"
                        >
                            <span>Verifikasi Kredensial</span>
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</section>
