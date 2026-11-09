<div class="rounded-[2.5rem] bg-white/75 backdrop-blur-2xl border border-white/90 p-7 sm:p-10 space-y-6 shadow-2xl shadow-blue-500/10 relative overflow-hidden">
    <!-- Ambient Subtle Glow -->
    <div class="absolute -top-20 -left-20 w-48 h-48 bg-blue-100/30 rounded-full blur-2xl pointer-events-none"></div>

    <div class="relative z-10 space-y-6">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/80 backdrop-blur-md border border-blue-200 text-blue-700 font-mono text-xs uppercase tracking-wider font-semibold mb-3">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                <span>Kontak Langsung</span>
            </div>
            <h3 class="font-display font-extrabold text-2xl sm:text-3xl text-slate-900 tracking-tight">Kanal Komunikasi</h3>
            <p class="text-slate-600 text-sm leading-relaxed mt-2">
                Baik untuk kebutuhan rekayasa web, arsitektur basis data, proyek desain apparel, atau eksplorasi visual, saya siap berdiskusi secara profesional.
            </p>
        </div>

        <div class="space-y-4 pt-2">
            <!-- Email -->
            @if(!empty($profile?->email))
                <div class="flex items-start gap-4 p-3.5 rounded-2xl bg-white/60 backdrop-blur-md border border-white/90 hover:border-blue-300 transition duration-200 shadow-sm">
                    <div class="w-11 h-11 rounded-xl bg-blue-50 border border-blue-200/80 text-blue-600 flex items-center justify-center shrink-0 shadow-sm">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[11px] text-slate-500 font-mono font-bold uppercase tracking-wider">Alamat Surel</p>
                        <a href="mailto:{{ $profile->email }}" class="text-sm font-bold text-slate-800 hover:text-blue-600 transition duration-200">
                            {{ $profile->email }}
                        </a>
                    </div>
                </div>
            @endif

            <!-- Phone -->
            @if(!empty($profile?->phone))
                <div class="flex items-start gap-4 p-3.5 rounded-2xl bg-white/60 backdrop-blur-md border border-white/90 hover:border-blue-300 transition duration-200 shadow-sm">
                    <div class="w-11 h-11 rounded-xl bg-blue-50 border border-blue-200/80 text-blue-600 flex items-center justify-center shrink-0 shadow-sm">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[11px] text-slate-500 font-mono font-bold uppercase tracking-wider">Telepon / WhatsApp</p>
                        <a href="tel:{{ $profile->phone }}" class="text-sm font-bold text-slate-800 hover:text-blue-600 transition duration-200">
                            {{ $profile->phone }}
                        </a>
                    </div>
                </div>
            @endif

            <!-- Location -->
            <div class="flex items-start gap-4 p-3.5 rounded-2xl bg-white/60 backdrop-blur-md border border-white/90 shadow-sm">
                <div class="w-11 h-11 rounded-xl bg-blue-50 border border-blue-200/80 text-blue-600 flex items-center justify-center shrink-0 shadow-sm">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-[11px] text-slate-500 font-mono font-bold uppercase tracking-wider">Lokasi Domisili</p>
                    <p class="text-sm font-bold text-slate-800">
                        Malang, Jawa Timur, Indonesia
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
