<footer class="border-t border-slate-200 bg-white py-10 relative z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
            <!-- Brand & Tagline -->
            <div class="flex items-center gap-3 text-center md:text-left">
                <span class="w-8 h-8 rounded-lg bg-gradient-to-tr from-blue-600 to-indigo-600 flex items-center justify-center text-white font-display font-bold text-sm shadow-md">
                    {{ strtoupper(substr($profile->name ?? 'A', 0, 1)) }}
                </span>
                <div>
                    <p class="font-display font-bold text-slate-900 text-base">
                        {{ $profile->name ?? 'Achmad Alfi Maksum' }}<span class="text-blue-600">.</span>
                    </p>
                    <p class="text-xs text-slate-500">Membangun sistem web yang handal, desain merek & karya visual kreatif.</p>
                </div>
            </div>

            <!-- Quick Navigation Anchors -->
            <div class="flex flex-wrap items-center justify-center gap-6 text-xs font-medium text-slate-600">
                <a href="#home" class="hover:text-blue-600 transition duration-200">Beranda</a>
                <a href="#about" class="hover:text-blue-600 transition duration-200">Tentang Saya</a>
                <a href="#skills" class="hover:text-blue-600 transition duration-200">Keahlian</a>
                <a href="#projects" class="hover:text-blue-600 transition duration-200">Portofolio Karya</a>
                <a href="#journey" class="hover:text-blue-600 transition duration-200">Perjalanan</a>
                <a href="#contact" class="hover:text-blue-600 transition duration-200">Hubungi Saya</a>
            </div>

            <!-- Copyright & Admin Access -->
            <div class="flex items-center gap-4 text-xs font-mono text-slate-500 text-center md:text-right">
                <span>&copy; {{ date('Y') }} {{ $profile->name ?? 'Achmad Alfi Maksum' }}. Hak cipta dilindungi.</span>
                <span class="text-slate-300">•</span>
                <a href="{{ url('/admin') }}" class="text-slate-500 hover:text-blue-600 transition duration-200 flex items-center gap-1 font-sans">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    <span>Admin</span>
                </a>
            </div>
        </div>
    </div>
</footer>
