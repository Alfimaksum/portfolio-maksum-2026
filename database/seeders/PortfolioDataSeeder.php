<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class PortfolioDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 0. Bersihkan data sebelumnya agar tidak terjadi duplikasi data
        Profile::query()->delete();
        Skill::query()->delete();
        Project::query()->delete();
        Experience::query()->delete();

        // 1. Data Profile (Super Detail)
        Profile::create([
            'name' => 'Achmad Alfi Maksum',
            'headline' => 'Frontend Programmer, UI/UX Engineer & Desainer Grafis',
            'about_me' => 'Mahasiswa tingkat akhir D-IV Sistem Informasi Bisnis (NIM 244107060009) di Politeknik Negeri Malang. Saya adalah pengembang perangkat lunak hibrida yang memadukan keahlian TALL Stack (Tailwind, Alpine, Laravel, Livewire) dan Flutter dengan ketajaman estetika UI/UX. Lingkungan kerja utama saya berpusat pada Windows, VS Code, dan PostgreSQL. Saya terbiasa menyelesaikan masalah arsitektur antarmuka yang kompleks, mulai dari debugging navigasi mobile, perbaikan alur konversi (funnel), hingga perancangan desain berbasis riset akademik (System Usability Scale). Di luar kode, saya memimpin manajemen produksi dan desain kreatif sebagai founder brand apparel MAKSUNIT.',
            'email' => 'alpimaksum788@gmail.com',
            'phone' => '+62 858-5237-7736',
            'linkedin_url' => 'https://linkedin.com/in/achmad-alfi-maksum',
            'github_url' => 'https://github.com/Alfimaksum',
            'instagram_url' => 'https://instagram.com/Maksunitt',
        ]);

        // 2. Data Skills
        $skillsData = [
            'Web & Mobile' => [
                'Laravel 13',
                'Livewire 3',
                'Alpine.js',
                'TailwindCSS',
                'Filament v3',
                'PHP 8.3',
                'HTML/CSS',
                'JavaScript',
                'Flutter',
                'Dart',
                'Kotlin',
            ],
            'UI/UX & Desain' => [
                'Figma',
                'Photoshop',
                'CorelDRAW',
                'Canva',
            ],
            'Database & Data' => [
                'PostgreSQL 15',
                'MySQL',
                'Pentaho (ETL)',
                'DBeaver',
            ],
            'Jaringan' => [
                'MikroTik',
                'TCP/IP',
                'VLAN',
                'Subnetting',
                'Fiber Optic (Fusion Splicer)',
            ],
            'Soft Skills' => [
                'Leadership',
                'Koordinasi Tim',
                'Problem Solving',
            ],
        ];

        $skillOrder = 1;
        foreach ($skillsData as $category => $items) {
            foreach ($items as $skillName) {
                Skill::create([
                    'name' => $skillName,
                    'category' => $category,
                    'icon_path' => null,
                    'order_column' => $skillOrder++,
                ]);
            }
        }

        // 3. Data Projects (Detail Teknis Maksimal)
        $projects = [
            [
                'title' => 'FitCore Gym Management',
                'slug' => 'fitcore-gym-management',
                'category' => 'Web Development',
                'role' => 'Lead Full-Stack Architect',
                'tech_stack' => ['Laravel 13', 'Filament v3', 'TailwindCSS', 'Livewire'],
                'is_featured' => true,
                'short_description' => "Sistem informasi manajemen gym berskala penuh. Di proyek ini, saya memimpin standarisasi tema 'Maxfit Red' (#ED1B45) di seluruh platform desktop dan mobile. Pencapaian teknis utama saya meliputi: mendesain ulang tata letak paket keanggotaan menjadi format grid 2-kolom (grid-cols-2) berskala dinamis, memperbaiki bug state aktif pada navigasi mobile, mengatasi isu prapemilihan (preselection) ID Trainer pada sistem booking, serta menyelesaikan masalah persistensi redirect di mobile. Saya juga melakukan migrasi penuh semua tampilan member ke mode terang (light mode) tanpa merusak logika bisnis back-end.",
                'detailed_description' => "FitCore Gym Management adalah sistem informasi manajemen gym berskala penuh. Di proyek ini, saya memimpin standarisasi tema 'Maxfit Red' (#ED1B45) di seluruh platform desktop dan mobile. Pencapaian teknis utama saya meliputi: mendesain ulang tata letak paket keanggotaan menjadi format grid 2-kolom (grid-cols-2) berskala dinamis, memperbaiki bug state aktif pada navigasi mobile, mengatasi isu prapemilihan (preselection) ID Trainer pada sistem booking, serta menyelesaikan masalah persistensi redirect di mobile. Saya juga melakukan migrasi penuh semua tampilan member ke mode terang (light mode) tanpa merusak logika bisnis back-end.",
                'github_url' => 'https://github.com/alpimaksum788/fitcore-gym',
                'demo_url' => null,
                'order_column' => 1,
            ],
            [
                'title' => 'Evaluasi UI/UX SIAKAD & SPADA Polinema',
                'slug' => 'evaluasi-uiux-siakad-spada-polinema',
                'category' => 'UI/UX Design',
                'role' => 'UI/UX Researcher & Product Designer',
                'tech_stack' => ['Figma', 'SUS', 'Usability Testing'],
                'is_featured' => true,
                'short_description' => 'Riset akademik komprehensif untuk mengevaluasi antarmuka Sistem Informasi Akademik (SIAKAD) dan LMS SPADA. Proyek ini mencakup penulisan Bab 1 dan Bab 2 dengan tinjauan literatur yang ketat, mengacu pada standar jurnal internasional bereputasi tinggi dalam 10 tahun terakhir. Pengujian lapangan dilakukan menggunakan metode System Usability Scale (SUS) dan Task-based Usability Testing untuk memvalidasi hipotesis dan menemukan titik henti (friction points) pengguna.',
                'detailed_description' => 'Riset akademik komprehensif untuk mengevaluasi antarmuka Sistem Informasi Akademik (SIAKAD) dan LMS SPADA. Proyek ini mencakup penulisan Bab 1 dan Bab 2 dengan tinjauan literatur yang ketat, mengacu pada standar jurnal internasional bereputasi tinggi dalam 10 tahun terakhir. Pengujian lapangan dilakukan menggunakan metode System Usability Scale (SUS) dan Task-based Usability Testing untuk memvalidasi hipotesis dan menemukan titik henti (friction points) pengguna.',
                'github_url' => null,
                'demo_url' => null,
                'order_column' => 2,
            ],
            [
                'title' => 'LapangKu Mobile App & LAP Website',
                'slug' => 'lapangku-mobile-app-lap-website',
                'category' => 'Mobile App',
                'role' => 'Mobile Developer & UI Designer',
                'tech_stack' => ['Flutter', 'Riverpod', 'Figma'],
                'is_featured' => true,
                'short_description' => 'Pengembangan front-end dan perancangan UI/UX untuk aplikasi reservasi lapangan olahraga. Berawal dari wireframe hingga purwarupa presisi tinggi (high-fidelity) di Figma, saya kemudian menerjemahkannya ke dalam kode Dart menggunakan framework Flutter. State management ditangani menggunakan Riverpod untuk memastikan responsivitas data real-time pada antarmuka pengguna tanpa membebani performa memori perangkat.',
                'detailed_description' => 'Pengembangan front-end dan perancangan UI/UX untuk aplikasi reservasi lapangan olahraga. Berawal dari wireframe hingga purwarupa presisi tinggi (high-fidelity) di Figma, saya kemudian menerjemahkannya ke dalam kode Dart menggunakan framework Flutter. State management ditangani menggunakan Riverpod untuk memastikan responsivitas data real-time pada antarmuka pengguna tanpa membebani performa memori perangkat.',
                'github_url' => null,
                'demo_url' => null,
                'order_column' => 3,
            ],
            [
                'title' => 'MAKSUNIT Apparel Work Jacket',
                'slug' => 'maksunit-apparel-work-jacket',
                'category' => 'Graphic Design',
                'role' => 'Founder & Creative Director',
                'tech_stack' => ['Photoshop', 'CorelDRAW'],
                'is_featured' => true,
                'short_description' => 'Founder sekaligus desainer utama untuk MAKSUNIT. Mengelola siklus produksi penuh (Batch 1 hingga Extended Pre-Orders) untuk produk unggulan: Work Jacket Teknik Informatika (bukan workshirt biasa). Fokus pada spesifikasi premium menggunakan material High-Quality American Drill, BTM lining, dan bordir benang emas kustom. Mengembangkan aset identitas visual merek dengan elemen desain bergaya teknologi modern.',
                'detailed_description' => 'Founder sekaligus desainer utama untuk MAKSUNIT. Mengelola siklus produksi penuh (Batch 1 hingga Extended Pre-Orders) untuk produk unggulan: Work Jacket Teknik Informatika (bukan workshirt biasa). Fokus pada spesifikasi premium menggunakan material High-Quality American Drill, BTM lining, dan bordir benang emas kustom. Mengembangkan aset identitas visual merek dengan elemen desain bergaya teknologi modern.',
                'github_url' => null,
                'demo_url' => 'https://instagram.com/Maksunitt',
                'order_column' => 4,
            ],
            [
                'title' => 'Simple POS Kelompok 03',
                'slug' => 'simple-pos-kelompok-03',
                'category' => 'Web Development',
                'role' => 'Backend & Database Developer',
                'tech_stack' => ['Laravel', 'HTML/CSS', 'MySQL'],
                'is_featured' => false,
                'short_description' => 'Aplikasi kasir (Point of Sales) sederhana berbasis web dengan fitur pembuatan laporan dalam format PDF.',
                'detailed_description' => 'Aplikasi POS sederhana berbasis web untuk pencatatan transaksi harian, inventaris barang, dan laporan penjualan periodik yang diekspor ke PDF.',
                'github_url' => 'https://github.com/alpimaksum788/simple-pos-kelompok-03',
                'demo_url' => null,
                'order_column' => 5,
            ],
            [
                'title' => 'Data Warehouse Project',
                'slug' => 'data-warehouse-project',
                'category' => 'Web Development',
                'role' => 'Data Engineer',
                'tech_stack' => ['Pentaho', 'PostgreSQL', 'ETL'],
                'is_featured' => false,
                'short_description' => 'Merancang dan mengeksekusi pipa data ETL (Extract, Transform, Load) menggunakan Pentaho Data Integration dan PostgreSQL.',
                'detailed_description' => 'Implementasi data warehouse dengan skema bintang (star schema) untuk analitik bisnis dan pemrosesan data ETL berskala besar.',
                'github_url' => null,
                'demo_url' => null,
                'order_column' => 6,
            ],
            [
                'title' => 'Digital Branding Studio',
                'slug' => 'digital-branding-studio',
                'category' => 'Graphic Design',
                'role' => 'Visual Brand Designer',
                'tech_stack' => ['Photoshop', 'Canva', 'Figma'],
                'is_featured' => false,
                'short_description' => 'Kolaborasi intensif dalam kelompok studio (bersama Rani, Galuh, dan Valia) untuk memecahkan masalah identitas visual klien. Bertanggung jawab dalam merancang aset kreatif, panduan gaya merek (brand guidelines), dan implementasi desain pada berbagai media digital.',
                'detailed_description' => 'Kolaborasi intensif dalam kelompok studio (bersama Rani, Galuh, dan Valia) untuk memecahkan masalah identitas visual klien. Bertanggung jawab dalam merancang aset kreatif, panduan gaya merek (brand guidelines), dan implementasi desain pada berbagai media digital.',
                'github_url' => null,
                'demo_url' => null,
                'order_column' => 7,
            ],
        ];

        foreach ($projects as $projectData) {
            Project::create($projectData);
        }

        // 4. Data Experiences (Pengalaman Operasional & Kepemimpinan)
        $experiences = [
            [
                'title' => 'Freelance Graphic Designer, Web Developer & IT Technician',
                'institution' => 'Freelance / Self-Employed',
                'type' => 'Profesional',
                'phase' => 'Profesional',
                'start_date' => '2026-01-01',
                'end_date' => null,
                'description' => 'Menerima proyek purna-waktu untuk perancangan antarmuka web, desain grafis komersial, dan dukungan infrastruktur IT. Mampu mengonfigurasi dan memelihara environment pengembangan server lokal secara mandiri (melibatkan Laragon, Antigravity IDE, dan manajemen port PostgreSQL 15 di Local Disk D).',
                'skills_gained' => ['Laravel', 'Flutter', 'Desain Grafis', 'Server Configuration', 'IT Support'],
                'order_column' => 1,
            ],
            [
                'title' => 'Founder & Apparel Designer',
                'institution' => 'MAKSUNIT Apparel',
                'type' => 'Profesional',
                'phase' => 'Profesional',
                'start_date' => '2023-01-01',
                'end_date' => null,
                'description' => 'Membangun brand streetwear MAKSUNIT. Merancang identitas visual, grafis bertema tech, dan memproduksi apparel berkualitas tinggi.',
                'skills_gained' => ['Creative Direction', 'Apparel Design', 'Photoshop', 'CorelDRAW', 'Brand Identity'],
                'order_column' => 2,
            ],
            [
                'title' => 'Appointed Project Leader & Koordinator HMTI',
                'institution' => 'Himpunan Mahasiswa Teknologi Informasi (HMTI) Polinema',
                'type' => 'Organisasi',
                'phase' => 'HMTI/Organisasi',
                'start_date' => '2024-08-01',
                'end_date' => '2025-12-31',
                'description' => 'Berperan penting dalam manajemen krisis dan operasional acara besar kampus. Mengemban tanggung jawab sebagai Appointed Project Leader untuk Study Excursie 2025. Di acara lain (Sportif, Pilketum, Makrab, Semnas), saya mengelola divisi PDD, mendokumentasikan kegiatan Prastudi, memastikan keamanan Open Recruitment, serta bertindak sebagai Operator Live Streaming teknis.',
                'skills_gained' => ['Leadership', 'Project Management', 'Live Streaming', 'Event Coordination'],
                'order_column' => 3,
            ],
            [
                'title' => 'Network Technician Intern',
                'institution' => 'SMK Telkom Darul Ulum Jombang',
                'type' => 'Magang',
                'phase' => 'SMK Telkom',
                'start_date' => '2021-06-01',
                'end_date' => '2023-12-31',
                'description' => 'Praktek Kerja Lapangan di SMK Telkom Darul Ulum Jombang. Melakukan instalasi Fiber Optic menggunakan fusion splicer, konfigurasi MikroTik, dan pengujian konektivitas jaringan TCP/IP.',
                'skills_gained' => ['Fiber Optic', 'Fusion Splicer', 'MikroTik RouterOS', 'TCP/IP', 'Network Testing'],
                'order_column' => 4,
            ],
        ];

        foreach ($experiences as $expData) {
            Experience::create($expData);
        }
    }
}
