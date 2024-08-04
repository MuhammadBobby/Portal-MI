<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Berita Kampus',
            'slug' => 'berita-kampus',
            'description' => 'Berita terbaru dan update seputar kegiatan, acara, dan kebijakan yang berlaku di kampus.',
            'color' => '#004080',
            'logo' => 'berita-kampus.svg',
        ]);

        Category::create([
            'name' => 'Kegiatan Mahasiswa',
            'slug' => 'kegiatan-mahasiswa',
            'description' => 'Informasi tentang kegiatan, organisasi, dan event yang diadakan oleh mahasiswa.',
            'color' => '#008000',
            'logo' => 'kegiatan-mahasiswa.svg',
        ]);

        Category::create([
            'name' => 'Prestasi Mahasiswa',
            'slug' => 'prestasi-mahasiswa',
            'description' => 'Berita tentang pencapaian dan prestasi yang diraih oleh mahasiswa di dalam dan luar kampus.',
            'color' => '#FFD700',
            'logo' => 'prestasi.svg',
        ]);

        Category::create([
            'name' => 'Tips dan Trik Akademik',
            'slug' => 'tips-dan-trik-akademik',
            'description' => 'Saran dan panduan untuk membantu mahasiswa dalam hal akademik seperti belajar, manajemen waktu, dan persiapan ujian.',
            'color' => '#FFA500',
            'logo' => 'tips-dan-trik-akademik.svg',
        ]);

        Category::create([
            'name' => 'Alumni',
            'slug' => 'alumni',
            'description' => 'Berita tentang kegiatan dan pencapaian alumni setelah lulus dari kampus.',
            'color' => '#800000',
            'logo' => 'alumni.svg',
        ]);

        Category::create([
            'name' => 'Lowongan Kerja dan Magang',
            'slug' => 'lowongan-kerja-dan-magang',
            'description' => 'Informasi mengenai peluang kerja dan magang yang relevan dengan bidang studi.',
            'color' => '#708090',
            'logo' => 'lowongan-kerja-dan-magang.svg',
        ]);

        Category::create([
            'name' => 'Agenda dan Event',
            'slug' => 'agenda-dan-event',
            'description' => 'Jadwal dan informasi tentang acara, seminar, dan workshop yang akan datang.',
            'color' => '#800080',
            'logo' => 'agenda-dan-event.svg',
        ]);

        Category::create([
            'name' => 'Opini',
            'slug' => 'opini',
            'description' => 'Tulisan opini dari mahasiswa, dosen, dan alumni mengenai topik yang relevan.',
            'color' => '#8B4513',
            'logo' => 'opini.svg',
        ]);
    }
}
