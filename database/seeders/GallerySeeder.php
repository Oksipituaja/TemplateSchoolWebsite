<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Gallery::create([
            'title' => 'Upacara Bendera Hari Senin',
            'slug' => 'upacara-bendera-hari-senin',
            'description' => 'Upacara bendera rutin kami setiap hari Senin pagi. Semua siswa dan guru hadir dengan tertib dan disiplin.',
            'category' => 'Acara Sekolah',
            'image' => 'gallery/upacara-bendera.jpg',
        ]);

        Gallery::create([
            'title' => 'Kelas Baca Bersama',
            'slug' => 'kelas-baca-bersama',
            'description' => 'Program membaca bersama di perpustakaan sekolah untuk meningkatkan minat baca siswa.',
            'category' => 'Program Pembelajaran',
            'image' => 'gallery/kelas-baca.jpg',
        ]);

        Gallery::create([
            'title' => 'Olahraga Antar Kelas',
            'slug' => 'olahraga-antar-kelas',
            'description' => 'Turnamen olahraga antar kelas yang meriah dengan partisipasi dari semua kelas.',
            'category' => 'Olahraga',
            'image' => 'gallery/olahraga.jpg',
        ]);

        Gallery::create([
            'title' => 'Pameran Karya Siswa',
            'slug' => 'pameran-karya-siswa',
            'description' => 'Pameran karya seni dan kreativitas siswa di aula sekolah.',
            'category' => 'Seni',
            'image' => 'gallery/pameran-karya.jpg',
        ]);
    }
}
