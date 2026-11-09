<section id="about" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative">
    <!-- Frosted Glass Narrative Card (Inspired by Inspirasi 2 & 7) -->
    <div class="rounded-[2.5rem] bg-white/75 backdrop-blur-2xl border border-white/90 p-8 sm:p-14 shadow-2xl shadow-blue-500/10 relative overflow-hidden transition duration-300 hover:border-blue-300/80">
        <!-- Soft Blue Ambient Background Glow -->
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-gradient-to-br from-blue-400/15 via-sky-300/10 to-transparent rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 max-w-4xl">
            <!-- Section Kicker Badge -->
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/80 backdrop-blur-md border border-blue-200 text-blue-700 font-mono text-xs uppercase tracking-wider font-semibold mb-4 shadow-sm shadow-blue-500/5">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                <span>Tentang Saya & Filosofi Rekayasa</span>
            </div>

            <!-- Heading -->
            <h2 class="font-display font-extrabold text-3xl sm:text-5xl text-slate-900 mb-6 tracking-tight leading-tight">
                Memadukan ketelitian rekayasa sistem dengan <span class="blue-gradient-text">estetika desain visual</span>.
            </h2>

            <!-- Narrative Content -->
            <div class="text-slate-600 text-base sm:text-lg leading-relaxed space-y-4 font-normal">
                {!! !empty($profile->about_me) ? $profile->about_me : 'Mahasiswa tingkat akhir D-IV Sistem Informasi Bisnis Politeknik Negeri Malang yang bersemangat dalam membangun aplikasi web modern (Laravel & Flutter) sekaligus merancang antarmuka UI/UX dan identitas merek yang estetis.' !!}
            </div>

            <!-- Stats Counter Partial (Bento Micro Stats) -->
            @include('guest.features.about.stats-counter')
        </div>
    </div>
</section>
