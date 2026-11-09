<div class="rounded-[2.5rem] bg-white/75 backdrop-blur-2xl border border-white/90 p-7 sm:p-10 shadow-2xl shadow-blue-500/10 relative overflow-hidden">
    <!-- Ambient Subtle Glow -->
    <div class="absolute -top-24 -right-24 w-60 h-60 bg-indigo-100/30 rounded-full blur-2xl pointer-events-none"></div>

    <form action="{{ route('contact.send') }}" method="POST" class="space-y-5 relative z-10">
        @csrf

        @if(isset($errors) && $errors->any())
            <div class="p-4 rounded-2xl bg-rose-50/90 backdrop-blur-md border border-rose-200 text-rose-700 text-xs sm:text-sm">
                <p class="font-bold mb-1">Mohon periksa kembali formulir Anda:</p>
                <ul class="list-disc list-inside space-y-0.5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <!-- Nama Lengkap Field -->
            <div>
                <label for="contact_name" class="block text-xs font-mono font-bold text-slate-700 uppercase tracking-wider mb-2">
                    Nama Lengkap <span class="text-blue-600">*</span>
                </label>
                <input 
                    type="text" 
                    name="name" 
                    id="contact_name" 
                    value="{{ old('name') }}"
                    required 
                    placeholder="Contoh: Budi Santoso"
                    class="w-full px-4 py-3.5 rounded-2xl bg-white/70 backdrop-blur-md border border-slate-200/90 text-slate-800 placeholder-slate-400 text-sm focus:bg-white focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20 transition duration-200"
                >
            </div>

            <!-- Alamat Email Field -->
            <div>
                <label for="contact_email" class="block text-xs font-mono font-bold text-slate-700 uppercase tracking-wider mb-2">
                    Alamat Email <span class="text-blue-600">*</span>
                </label>
                <input 
                    type="email" 
                    name="email" 
                    id="contact_email" 
                    value="{{ old('email') }}"
                    required 
                    placeholder="budi@perusahaan.com"
                    class="w-full px-4 py-3.5 rounded-2xl bg-white/70 backdrop-blur-md border border-slate-200/90 text-slate-800 placeholder-slate-400 text-sm focus:bg-white focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20 transition duration-200"
                >
            </div>
        </div>

        <!-- Subjek Pesan Field -->
        <div>
            <label for="contact_subject" class="block text-xs font-mono font-bold text-slate-700 uppercase tracking-wider mb-2">
                Subjek / Keperluan <span class="text-blue-600">*</span>
            </label>
            <input 
                type="text" 
                name="subject" 
                id="contact_subject" 
                value="{{ old('subject') }}"
                required 
                placeholder="Misal: Penawaran Proyek Full-Stack / Branding Apparel"
                class="w-full px-4 py-3.5 rounded-2xl bg-white/70 backdrop-blur-md border border-slate-200/90 text-slate-800 placeholder-slate-400 text-sm focus:bg-white focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20 transition duration-200"
            >
        </div>

        <!-- Isi Pesan Field -->
        <div>
            <label for="contact_body" class="block text-xs font-mono font-bold text-slate-700 uppercase tracking-wider mb-2">
                Pesan & Rincian Kebutuhan <span class="text-blue-600">*</span>
            </label>
            <textarea 
                name="body" 
                id="contact_body" 
                rows="4" 
                required 
                placeholder="Tuliskan ide, cakupan proyek, atau pertanyaan kerja sama Anda di sini..."
                class="w-full px-4 py-3.5 rounded-2xl bg-white/70 backdrop-blur-md border border-slate-200/90 text-slate-800 placeholder-slate-400 text-sm focus:bg-white focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20 transition duration-200 resize-y"
            >{{ old('body') }}</textarea>
        </div>

        <!-- Tombol Kirim Pesan -->
        <div class="pt-2">
            <button 
                type="submit" 
                class="w-full inline-flex items-center justify-center gap-2.5 px-6 py-4 rounded-2xl font-extrabold text-sm sm:text-base text-white bg-blue-600 hover:bg-blue-700 shadow-xl shadow-blue-500/25 hover:shadow-2xl hover:shadow-blue-500/35 hover:-translate-y-0.5 transition duration-200 active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-500/50"
            >
                <span>Kirim Pesan Sekarang</span>
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </button>
        </div>
    </form>
</div>
