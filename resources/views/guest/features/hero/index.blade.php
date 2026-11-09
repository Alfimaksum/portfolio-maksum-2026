<section id="home" class="relative pt-10 md:pt-20 pb-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 overflow-hidden">
    <!-- Huge Editorial Watermark Typography in Background (Inspired by Inspirasi 1, 3, 7) -->
    <div class="absolute -top-6 sm:-top-12 left-1/2 -translate-x-1/2 w-full select-none pointer-events-none overflow-hidden text-center z-0" aria-hidden="true">
        <span class="font-display font-black text-7xl sm:text-9xl md:text-[11rem] lg:text-[13rem] tracking-tighter text-blue-900/[0.04] uppercase whitespace-nowrap block">
            PORTFOLIO
        </span>
    </div>

    <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
        <!-- Editorial Content Column (7 cols) -->
        <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
            <!-- Availability Pill with High-End Glass Effect -->
            <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white/80 backdrop-blur-xl border border-blue-200/80 text-blue-700 text-xs sm:text-sm font-mono tracking-tight shadow-sm shadow-blue-500/5">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-500 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-600"></span>
                </span>
                <span class="font-semibold">Terbuka untuk Kolaborasi & Proyek Digital</span>
            </div>

            <!-- Greeting Label -->
            <p class="text-xs sm:text-sm font-mono font-bold tracking-widest text-blue-600 uppercase">
                // Halo, Selamat Datang
            </p>

            <!-- Main High-Impact Editorial Heading (Bold & Tight Tracking) -->
            <h1 class="font-display font-extrabold text-4xl sm:text-6xl md:text-7xl lg:text-[4.75rem] text-slate-900 tracking-tight leading-[1.04]">
                {{ $profile->name ?? 'Achmad Alfi Maksum' }}
            </h1>

            <!-- Editorial Tagline / Contrast Subtitle -->
            <div class="text-xl sm:text-2xl md:text-3xl font-semibold text-slate-800 tracking-tight flex flex-wrap items-center justify-center lg:justify-start gap-2">
                <span class="blue-gradient-text font-bold">Full-Stack Web Developer</span>
                <span class="text-slate-300 font-light">&</span>
                <span class="text-slate-700 font-medium">Desainer Visual</span>
            </div>

            <!-- Bio Narrative Summary -->
            <p class="text-slate-600 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto lg:mx-0 font-normal">
                {{ !empty($profile->about_me) ? Str::limit(strip_tags($profile->about_me), 250) : 'Mahasiswa tingkat akhir D-IV Sistem Informasi Bisnis Politeknik Negeri Malang yang berdedikasi membangun sistem web skalabel dengan Laravel & PostgreSQL, sekaligus merancang identitas visual, UI/UX modern, dan fotografi estetis.' }}
            </p>

            <!-- Action CTAs -->
            <div class="pt-2 flex flex-wrap items-center justify-center lg:justify-start gap-4">
                @if($profile?->cv_file_path)
                    <x-buttons.primary-gold href="{{ asset('storage/' . $profile->cv_file_path) }}" target="_blank">
                        <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span>Unduh Curriculum Vitae</span>
                    </x-buttons.primary-gold>
                @else
                    <x-buttons.primary-gold href="#contact">
                        <span>Hubungi Saya</span>
                    </x-buttons.primary-gold>
                @endif

                <a 
                    href="#projects" 
                    class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl font-semibold text-sm sm:text-base text-slate-700 bg-white/80 backdrop-blur-xl border border-white/90 hover:border-blue-400 hover:bg-blue-50/50 hover:text-blue-600 hover:-translate-y-0.5 transition duration-200 shadow-sm"
                >
                    <span>Eksplorasi Karya</span>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
            </div>

            <!-- Social Connectivity Links -->
            <div class="pt-4 flex items-center justify-center lg:justify-start gap-3">
                @if($profile?->github_url)
                    <a href="{{ $profile->github_url }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-xl bg-white/80 backdrop-blur-md hover:bg-blue-50 border border-slate-200 hover:border-blue-300 text-slate-600 hover:text-blue-600 flex items-center justify-center shadow-sm hover:-translate-y-1 transition duration-200" aria-label="Profil GitHub">
                        <svg class="w-5 h-5 fill-currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/>
                        </svg>
                    </a>
                @endif
                @if($profile?->linkedin_url)
                    <a href="{{ $profile->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-xl bg-white/80 backdrop-blur-md hover:bg-blue-50 border border-slate-200 hover:border-blue-300 text-slate-600 hover:text-blue-600 flex items-center justify-center shadow-sm hover:-translate-y-1 transition duration-200" aria-label="Profil LinkedIn">
                        <svg class="w-5 h-5 fill-currentColor" viewBox="0 0 24 24">
                            <path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 8.76a1.67 1.67 0 1 0 0-3.34 1.67 1.67 0 0 0 0 3.34M7.86 18.5V10.1H5.06v8.4h2.8z"/>
                        </svg>
                    </a>
                @endif
                @if($profile?->instagram_url)
                    <a href="{{ $profile->instagram_url }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-xl bg-white/80 backdrop-blur-md hover:bg-blue-50 border border-slate-200 hover:border-blue-300 text-slate-600 hover:text-blue-600 flex items-center justify-center shadow-sm hover:-translate-y-1 transition duration-200" aria-label="Profil Instagram">
                        <svg class="w-5 h-5 fill-currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                @endif
                @if($profile?->email)
                    <a href="mailto:{{ $profile->email }}" class="w-10 h-10 rounded-xl bg-white/80 backdrop-blur-md hover:bg-blue-50 border border-slate-200 hover:border-blue-300 text-slate-600 hover:text-blue-600 flex items-center justify-center shadow-sm hover:-translate-y-1 transition duration-200" aria-label="Kirim Email Langsung">
                        <svg class="w-5 h-5 fill-none stroke-currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </a>
                @endif
            </div>
        </div>

        <!-- Avatar Visual Column with Concentric Rings & Frosted Glass Frame (Inspired by Inspirasi 2 & 3) -->
        <div class="lg:col-span-5 flex justify-center relative">
            <!-- Concentric Circular Background Target Art (Inspired by Inspirasi 2 & 3) -->
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none -z-10" aria-hidden="true">
                <div class="w-72 h-72 sm:w-96 sm:h-96 rounded-full border border-blue-400/20 animate-pulse"></div>
                <div class="w-56 h-56 sm:w-80 sm:h-80 rounded-full border border-blue-500/15 absolute"></div>
                <div class="w-40 h-40 sm:w-64 sm:h-64 rounded-full border border-sky-400/20 absolute"></div>
            </div>

            <div class="relative group">
                <!-- Blue Soft Aura Glow -->
                <div class="absolute -inset-3 bg-gradient-to-tr from-blue-600/20 via-sky-400/20 to-indigo-500/20 rounded-[2.5rem] blur-2xl opacity-60 group-hover:opacity-90 transition duration-500"></div>

                <!-- Floating Top-Right Pill Badge (Inspired by Inspirasi 3 & 5) -->
                <div class="absolute -top-4 -right-4 sm:-top-5 sm:-right-5 z-20 bg-white/85 backdrop-blur-xl border border-white/90 px-3.5 py-1.5 rounded-full shadow-lg shadow-blue-500/10 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-xs font-mono font-bold text-slate-700">Tersedia untuk Kolaborasi</span>
                </div>

                <!-- High-End Frosted Glass Frame Container -->
                <div class="relative w-64 h-64 sm:w-80 sm:h-80 rounded-[2.25rem] p-3 bg-white/60 backdrop-blur-2xl border border-white/80 overflow-hidden shadow-2xl shadow-blue-500/15 flex items-center justify-center transition duration-500 group-hover:border-blue-300">
                    @if($profile?->avatar_path)
                        <img 
                            src="{{ asset('storage/' . $profile->avatar_path) }}" 
                            alt="{{ $profile->name }}" 
                            class="w-full h-full object-cover rounded-3xl group-hover:scale-105 transition duration-500"
                        >
                    @else
                        <div class="w-full h-full rounded-3xl bg-gradient-to-br from-blue-50 via-sky-50 to-indigo-50 flex flex-col items-center justify-center text-center p-6 border border-blue-100/60 shadow-inner">
                            <div class="w-24 h-24 rounded-2xl bg-gradient-to-tr from-blue-600 to-indigo-600 text-white flex items-center justify-center font-display font-extrabold text-4xl mb-3 shadow-xl shadow-blue-500/30">
                                {{ strtoupper(substr($profile->name ?? 'AM', 0, 2)) }}
                            </div>
                            <p class="font-display font-bold text-slate-900 text-lg">{{ $profile->name ?? 'Achmad Alfi Maksum' }}</p>
                            <span class="text-xs text-blue-600 font-mono mt-1 font-semibold">Web Developer & Designer</span>
                        </div>
                    @endif
                </div>

                <!-- Floating Bottom-Left Academic Badge (Glassmorphic) -->
                <div class="absolute -bottom-4 -left-4 sm:-bottom-5 sm:-left-5 z-20 bg-white/90 backdrop-blur-xl border border-white/90 px-4 py-2.5 rounded-2xl shadow-xl shadow-slate-300/40 flex items-center gap-3">
                    <span class="text-2xl">🎓</span>
                    <div>
                        <p class="text-[10px] font-mono uppercase text-slate-400 font-bold tracking-wider">Polinema</p>
                        <p class="text-xs sm:text-sm font-bold text-blue-700">D-IV Sist. Info Bisnis</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
