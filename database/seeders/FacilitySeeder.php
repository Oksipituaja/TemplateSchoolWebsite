<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Facility::create([
            'name' => 'Perpustakaan',
            'slug' => 'perpustakaan',
            'description' => 'Perpustakaan lengkap dengan koleksi buku untuk mendukung pembelajaran siswa.',
            'icon' => 'book',
        ]);

        Facility::create([
            'name' => 'Laboratorium Komputer',
            'slug' => 'laboratorium-komputer',
            'description' => 'Lab komputer dengan 30 unit komputer untuk pembelajaran teknologi informasi.',
            'icon' => 'computer',
        ]);

        Facility::create([
            'name' => 'Lapangan Olahraga',
            'slug' => 'lapangan-olahraga',
            'description' => 'Lapangan olahraga yang luas untuk berbagai kegiatan olahraga dan upacara.',
            'icon' => 'trophy',
        ]);

        Facility::create([
            'name' => 'Kantin Sekolah',
            'slug' => 'kantin-sekolah',
            'description' => 'Kantin yang menyediakan makanan dan minuman sehat untuk siswa dan guru.',
            'icon' => 'utensils',
        ]);

        Facility::create([
            'name' => 'Ruang Kesehatan',
            'slug' => 'ruang-kesehatan',
            'description' => 'Ruang kesehatan yang dilengkapi dengan alat-alat medis untuk kesehatan siswa.',
            'icon' => 'heart',
        ]);
    }
}
