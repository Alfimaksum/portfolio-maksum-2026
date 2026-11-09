<header 
    x-data="{ mobileMenu: false, isScrolled: false }"
    @scroll.window="isScrolled = (window.pageYOffset > 15)"
    class="sticky top-0 z-50 transition-all duration-300 backdrop-blur-md bg-white/70 border-b border-slate-200/80"
    :class="isScrolled ? 'py-3.5 shadow-md shadow-slate-200/50' : 'py-5'"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <!-- Brand Mark / Logo -->
            <a href="#home" class="group flex items-center gap-2.5">
                <span class="w-9 h-9 rounded-xl bg-gradient-to-tr from-blue-600 via-blue-500 to-indigo-600 flex items-center justify-center text-white font-display font-bold text-lg shadow-md shadow-blue-500/30 group-hover:scale-105 transition duration-200">
                    {{ strtoupper(substr($profile->name ?? 'A', 0, 1)) }}
                </span>
                <span class="font-display font-bold text-lg sm:text-xl tracking-tight text-slate-900 group-hover:text-blue-600 transition duration-200">
                    {{ $profile->name ?? 'Achmad Alfi Maksum' }}<span class="text-blue-600">.</span>
                </span>
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden md:flex items-center gap-1 lg:gap-1.5" aria-label="Navigasi Utama">
                <a href="#home" class="px-3.5 py-2 text-sm font-medium text-slate-700 hover:text-blue-600 hover:bg-blue-50/60 rounded-lg transition duration-200">Beranda</a>
                <a href="#about" class="px-3.5 py-2 text-sm font-medium text-slate-700 hover:text-blue-600 hover:bg-blue-50/60 rounded-lg transition duration-200">Tentang Saya</a>
                <a href="#skills" class="px-3.5 py-2 text-sm font-medium text-slate-700 hover:text-blue-600 hover:bg-blue-50/60 rounded-lg transition duration-200">Keahlian</a>
                <a href="#projects" class="px-3.5 py-2 text-sm font-medium text-slate-700 hover:text-blue-600 hover:bg-blue-50/60 rounded-lg transition duration-200">Portofolio Karya</a>
                <a href="#journey" class="px-3.5 py-2 text-sm font-medium text-slate-700 hover:text-blue-600 hover:bg-blue-50/60 rounded-lg transition duration-200">Perjalanan</a>
                @if(isset($certificates) && $certificates->isNotEmpty())
                    <a href="#certificates" class="px-3.5 py-2 text-sm font-medium text-slate-700 hover:text-blue-600 hover:bg-blue-50/60 rounded-lg transition duration-200">Sertifikat</a>
                @endif
                <a href="#contact" class="ml-2 inline-flex items-center gap-2 px-4 py-2 text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-md shadow-blue-500/20 hover:-translate-y-0.5 transition duration-200">
                    <span>Hubungi Saya</span>
                </a>
            </nav>

            <!-- Mobile Hamburger Toggle -->
            <div class="md:hidden flex items-center">
                <button 
                    @click="mobileMenu = !mobileMenu"
                    type="button" 
                    class="p-2 rounded-lg text-slate-700 hover:text-blue-600 hover:bg-blue-50/60 focus:outline-none"
                    aria-label="Buka Menu Navigasi"
                >
                    <svg x-show="!mobileMenu" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                    <svg x-show="mobileMenu" x-cloak class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer -->
        <div 
            x-show="mobileMenu" 
            x-cloak
            @click.away="mobileMenu = false"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-3"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-3"
            class="md:hidden mt-3 p-4 bg-white/95 border border-slate-200 rounded-2xl shadow-xl flex flex-col gap-2 backdrop-blur-xl"
        >
            <a @click="mobileMenu = false" href="#home" class="px-3 py-2 text-sm font-medium text-slate-700 hover:text-blue-600 hover:bg-blue-50/60 rounded-lg transition duration-200">Beranda</a>
            <a @click="mobileMenu = false" href="#about" class="px-3 py-2 text-sm font-medium text-slate-700 hover:text-blue-600 hover:bg-blue-50/60 rounded-lg transition duration-200">Tentang Saya</a>
            <a @click="mobileMenu = false" href="#skills" class="px-3 py-2 text-sm font-medium text-slate-700 hover:text-blue-600 hover:bg-blue-50/60 rounded-lg transition duration-200">Keahlian</a>
            <a @click="mobileMenu = false" href="#projects" class="px-3 py-2 text-sm font-medium text-slate-700 hover:text-blue-600 hover:bg-blue-50/60 rounded-lg transition duration-200">Portofolio Karya</a>
            <a @click="mobileMenu = false" href="#journey" class="px-3 py-2 text-sm font-medium text-slate-700 hover:text-blue-600 hover:bg-blue-50/60 rounded-lg transition duration-200">Perjalanan</a>
            @if(isset($certificates) && $certificates->isNotEmpty())
                <a @click="mobileMenu = false" href="#certificates" class="px-3 py-2 text-sm font-medium text-slate-700 hover:text-blue-600 hover:bg-blue-50/60 rounded-lg transition duration-200">Sertifikat</a>
            @endif
            <a @click="mobileMenu = false" href="#contact" class="mt-2 text-center px-4 py-2.5 text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-md">
                Hubungi Saya
            </a>
        </div>
    </div>
</header>
