<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Teacher::create([
            'name' => 'Budi Santoso, S.Pd',
            'slug' => 'budi-santoso',
            'email' => 'budi.santoso@school.com',
            'phone' => '081234567890',
            'subject' => 'Kepemimpinan Pendidikan',
            'bio' => 'Kepala Sekolah dengan pengalaman lebih dari 10 tahun di bidang pendidikan.',
        ]);

        Teacher::create([
            'name' => 'Siti Nurhaliza, S.Pd',
            'slug' => 'siti-nurhaliza',
            'email' => 'siti.nurhaliza@school.com',
            'phone' => '081234567891',
            'subject' => 'Semua Mata Pelajaran',
            'bio' => 'Guru Kelas I yang berpengalaman dalam mengajar anak-anak kelas awal.',
        ]);

        Teacher::create([
            'name' => 'Ahmad Wijaya, S.Pd',
            'slug' => 'ahmad-wijaya',
            'email' => 'ahmad.wijaya@school.com',
            'phone' => '081234567892',
            'subject' => 'Matematika',
            'bio' => 'Guru matematika dengan metode pengajaran yang inovatif dan interaktif.',
        ]);

        Teacher::create([
            'name' => 'Dewi Lestari, S.Pd',
            'slug' => 'dewi-lestari',
            'email' => 'dewi.lestari@school.com',
            'phone' => '081234567893',
            'subject' => 'Bahasa Indonesia',
            'bio' => 'Guru bahasa Indonesia yang fokus pada pengembangan kemampuan menulis dan membaca siswa.',
        ]);

        Teacher::create([
            'name' => 'Roni Hermawan, S.Pd',
            'slug' => 'roni-hermawan',
            'email' => 'roni.hermawan@school.com',
            'phone' => '081234567894',
            'subject' => 'Pendidikan Jasmani Olahraga Kesehatan',
            'bio' => 'Guru PJOK yang antusias dalam mengembangkan kesehatan dan kebugaran siswa.',
        ]);
    }
}
