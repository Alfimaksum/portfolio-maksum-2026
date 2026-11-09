<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $profile->name ?? 'Achmad Alfi Maksum' }} — Portofolio Profesional</title>
    <meta name="description" content="{{ $profile->headline ?? 'Full-Stack Web Developer & Desainer Visual' }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (CDN with modern light blue agency theme) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        display: ['"Space Grotesk"', 'sans-serif']
                    }
                }
            }
        }
    </script>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        ::selection {
            background-color: #2563eb;
            color: #ffffff;
        }
        .blue-gradient-text {
            background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 50%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .bg-grid-pattern {
            background-size: 40px 40px;
            background-image: 
                linear-gradient(to right, rgba(37, 99, 235, 0.04) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(37, 99, 235, 0.04) 1px, transparent 1px);
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.72);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.85);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased selection:bg-blue-600 selection:text-white min-h-screen relative overflow-x-hidden flex flex-col justify-between">

    <!-- Subtle Technical Grid & Ambient Glow Orbs (Inspired by Modern Bento UI) -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden bg-grid-pattern" aria-hidden="true">
        <div class="absolute -top-32 left-1/4 w-[42rem] h-[42rem] bg-gradient-to-br from-blue-400/15 via-sky-300/10 to-transparent rounded-full blur-3xl"></div>
        <div class="absolute top-1/3 -right-32 w-[38rem] h-[38rem] bg-gradient-to-bl from-indigo-300/15 via-blue-200/10 to-transparent rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 left-10 w-[36rem] h-[36rem] bg-gradient-to-tr from-sky-400/10 via-blue-100/20 to-transparent rounded-full blur-3xl"></div>
    </div>

    <!-- Sticky Navigation -->
    @include('guest.layouts.navbar')

    <!-- Toast Notification Container -->
    <div 
        x-data="{ show: {{ session('success') ? 'true' : 'false' }} }" 
        x-show="show" 
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-2 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-2 scale-95"
        class="fixed bottom-6 right-6 z-50 max-w-md w-full px-4"
    >
        <div class="p-4 rounded-2xl bg-white/95 border border-blue-200 shadow-xl shadow-blue-500/10 backdrop-blur-md flex items-start gap-3.5">
            <div class="w-8 h-8 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <div class="flex-1">
                <p class="text-xs font-mono uppercase text-blue-600 tracking-wider font-semibold">Pesan Berhasil Terkirim</p>
                <p class="text-sm text-slate-700 mt-0.5 leading-snug">{{ session('success') }}</p>
            </div>
            <button @click="show = false" class="text-slate-400 hover:text-slate-600 p-1 rounded-lg transition-colors" aria-label="Tutup Notifikasi">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Main Content Slot -->
    <main class="relative z-10 flex-grow">
        @yield('content')
        {{ $slot ?? '' }}
    </main>

    <!-- Footer -->
    @include('guest.layouts.footer')

</body>
</html>
