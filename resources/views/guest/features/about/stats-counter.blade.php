<!-- Editorial Bento Stats Row (Inspired by Inspirasi 2 & 7) -->
<div class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-8 mt-8 border-t border-slate-100">
    <!-- Projects Built -->
    <div class="p-5 rounded-2xl bg-white/70 backdrop-blur-md border border-white/90 hover:border-blue-400 hover:bg-blue-50/40 hover:-translate-y-1 transition duration-200 shadow-sm hover:shadow-md group">
        <p class="text-3xl sm:text-4xl font-display font-extrabold text-blue-600 tracking-tight">{{ max($projects->count(), 8) }}+</p>
        <p class="text-xs sm:text-sm text-slate-500 mt-1 font-semibold uppercase tracking-wider font-mono">Proyek Selesai</p>
    </div>

    <!-- Skills & Tools -->
    <div class="p-5 rounded-2xl bg-white/70 backdrop-blur-md border border-white/90 hover:border-blue-400 hover:bg-blue-50/40 hover:-translate-y-1 transition duration-200 shadow-sm hover:shadow-md group">
        <p class="text-3xl sm:text-4xl font-display font-extrabold text-blue-600 tracking-tight">{{ max($skills->count(), 16) }}+</p>
        <p class="text-xs sm:text-sm text-slate-500 mt-1 font-semibold uppercase tracking-wider font-mono">Alat & Toolkit</p>
    </div>

    <!-- Journey Milestones -->
    <div class="p-5 rounded-2xl bg-white/70 backdrop-blur-md border border-white/90 hover:border-blue-400 hover:bg-blue-50/40 hover:-translate-y-1 transition duration-200 shadow-sm hover:shadow-md group">
        <p class="text-3xl sm:text-4xl font-display font-extrabold text-blue-600 tracking-tight">{{ max($experiences->count(), 5) }}</p>
        <p class="text-xs sm:text-sm text-slate-500 mt-1 font-semibold uppercase tracking-wider font-mono">Jejak Karir</p>
    </div>

    <!-- Certifications -->
    <div class="p-5 rounded-2xl bg-white/70 backdrop-blur-md border border-white/90 hover:border-blue-400 hover:bg-blue-50/40 hover:-translate-y-1 transition duration-200 shadow-sm hover:shadow-md group">
        <p class="text-3xl sm:text-4xl font-display font-extrabold text-blue-600 tracking-tight">{{ max($certificates->count(), 6) }}+</p>
        <p class="text-xs sm:text-sm text-slate-500 mt-1 font-semibold uppercase tracking-wider font-mono">Sertifikasi Resmi</p>
    </div>
</div>
