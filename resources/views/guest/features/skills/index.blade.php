<section id="skills" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative">
    <!-- Section Header (Editorial Style) -->
    <div class="text-center max-w-2xl mx-auto mb-16">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/80 backdrop-blur-md border border-blue-200 text-blue-700 font-mono text-xs uppercase tracking-wider font-semibold mb-4 shadow-sm shadow-blue-500/5">
            <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
            <span>Kemampuan Teknis & Perangkat Kerja</span>
        </div>
        <h2 class="font-display font-extrabold text-3xl sm:text-5xl text-slate-900 tracking-tight leading-tight">
            Keahlian & <span class="blue-gradient-text">Toolkit Kreatif</span>
        </h2>
        <p class="text-slate-600 mt-4 text-base sm:text-lg leading-relaxed">
            Penguasaan mendalam dalam arsitektur perangkat lunak, sistem basis data, jaringan komputer, serta desain visual & UI/UX.
        </p>
    </div>

    @php
        // Organize existing DB skills by category
        $groupedSkills = $skills->groupBy('category');

        // Sensible categories aligned with prompt: Web & Mobile, Database, Networking, UI/UX, Tools
        $defaultCategories = [
            'Web & Mobile' => ['Laravel 13', 'PHP 8.3', 'PostgreSQL', 'Livewire', 'Alpine.js', 'Tailwind CSS', 'Flutter', 'RESTful API'],
            'Database' => ['PostgreSQL', 'MySQL', 'Redis', 'Database Indexing', 'Schema Design', 'Eloquent ORM', 'Query Optimization', 'Migrations'],
            'Networking' => ['TCP/IP & Routing', 'MikroTik RouterOS', 'Cisco Packet Tracer', 'Network Security', 'VLAN Configuration', 'Server Deployment', 'DNS / HTTPS', 'Linux Administration'],
            'UI/UX & Desain' => ['Figma UI Design', 'Brand Identity', 'Apparel Design', 'Adobe Photoshop', 'Adobe Illustrator', 'Responsive Layouts', 'Visual Hierarchy', 'Fotografi'],
            'Tools & DevOps' => ['Git & GitHub', 'Docker', 'FilamentPHP v3', 'Composer', 'Postman / Bruno', 'Visual Studio Code', 'Linux Shell', 'CI/CD Pipelines'],
        ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
        @if($groupedSkills->isNotEmpty())
            @foreach($groupedSkills as $categoryName => $catSkills)
                @include('guest.features.skills.skill-card', [
                    'category' => $categoryName,
                    'skills' => $catSkills,
                ])
            @endforeach
        @else
            @foreach($defaultCategories as $categoryName => $catSkillsList)
                @include('guest.features.skills.skill-card', [
                    'category' => $categoryName,
                    'skills' => $catSkillsList,
                ])
            @endforeach
        @endif
    </div>
</section>
