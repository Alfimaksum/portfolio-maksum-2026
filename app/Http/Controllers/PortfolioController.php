<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Message;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    /**
     * Menampilkan halaman utama portofolio.
     */
    public function index(): View
    {
        $profile = Profile::first() ?? new Profile([
            'name' => 'Achmad Alfi Maksum',
            'headline' => 'Full-Stack Web Developer & Desainer Visual',
            'about_me' => 'Mahasiswa tingkat akhir D-IV Sistem Informasi Bisnis Politeknik Negeri Malang yang bersemangat dalam membangun aplikasi web modern (Laravel & Flutter) sekaligus merancang antarmuka UI/UX dan identitas merek yang estetis.',
            'email' => 'alpimaksum788@gmail.com',
        ]);

        $skills = Skill::orderBy('order_column', 'asc')->get();
        $projects = Project::orderBy('order_column', 'asc')->get();
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        $certificates = Certificate::orderBy('issue_date', 'desc')->get();

        return view('index', compact('profile', 'skills', 'projects', 'experiences', 'certificates'));
    }

    /**
     * Menyimpan pesan masuk dari formulir kontak.
     */
    public function sendMessage(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:5000'],
        ]);

        Message::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'body' => $validated['body'],
            'is_read' => false,
        ]);

        return back()->with('success', 'Terima kasih! Pesan Anda telah berhasil terkirim. Saya akan segera merespons pesan Anda.');
    }
}
