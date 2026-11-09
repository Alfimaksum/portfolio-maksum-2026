<section id="contact" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 pb-24">
    <!-- Section Header -->
    <div class="text-center max-w-2xl mx-auto mb-16">
        <div class="inline-flex items-center gap-2 text-blue-600 font-mono text-xs sm:text-sm uppercase tracking-wider font-semibold mb-3">
            <span class="w-6 h-px bg-blue-600"></span>
            <span>Mari Berkolaborasi</span>
            <span class="w-6 h-px bg-blue-600"></span>
        </div>
        <h2 class="font-display font-bold text-3xl sm:text-4xl text-slate-900">
            Hubungi Saya
        </h2>
        <p class="text-slate-600 mt-3 text-base">
            Tertarik membangun sistem digital, merancang desain merek/apparel, atau mendiskusikan peluang kerja sama? Silakan kirimkan pesan Anda melalui formulir di bawah ini.
        </p>
    </div>

    <!-- Contact Content Layout Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 max-w-5xl mx-auto items-start">
        <!-- Direct Channels (5 cols) -->
        <div class="lg:col-span-5">
            @include('guest.features.contact.social-info')
        </div>

        <!-- Dispatch Form (7 cols) -->
        <div class="lg:col-span-7">
            @include('guest.features.contact.form')
        </div>
    </div>
</section>
