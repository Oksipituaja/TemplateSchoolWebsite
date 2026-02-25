<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        About::create([
            'title' => 'Sambutan Kepala Sekolah',
            'key' => 'principal_greeting',
            'content' => '<p>Puji syukur kami panjatkan ke hadirat Tuhan Yang Maha Esa atas karunia dan hidayah-Nya, sehingga kami semua dapat membaktikan segala hal yang kami miliki untuk kemajuan dunia pendidikan. Apapun bentuk dan sumbangsin yang kami berikan, jika dilandasi niat yang tulus tanpa memandang imbalan apapun akan menghasilkan mahakarya yang agung untuk bekal kita dan generasi setelah kita. Pendidikan adalah harga mati untuk menjadi pondasi bangsa dan negara dalam menghadapi perkembangan zaman. Hal ini sejalan dengan penguasaan teknologi untuk dimanfaatkan sebaikk mungkin, sehingga menciptakan iklim kondusif dalam ranah keilmuan. Dengan konsep yang kontekstual dan efektif, kami mengejewantahkan nilai-nilai pendidikan yang tertuang dalam visi misi SMK NEGERI 1 BANGSRI, sebagai panduan hukum dalam menjabarkan tujuan hakiki pendidikan.</p>',
            'image' => null,
        ]);

        About::create([
            'title' => 'Profil Sekolah',
            'key' => 'school_profile',
            'content' => '<h3>Profil Sekolah</h3><p>SD Bangsri adalah sekolah dasar swasta yang berkomitmen untuk memberikan pendidikan berkualitas tinggi dengan menggabungkan nilai-nilai tradisional dan inovasi modern.</p>',
        ]);

        About::create([
            'title' => 'Misi Kami',
            'key' => 'mission',
            'content' => '<h3>Misi</h3><p>Membangun generasi cerdas, berakhlak mulia, dan mandiri melalui pendidikan yang berkualitas, inovatif, dan berorientasi pada pengembangan potensi siswa.</p>',
        ]);

        About::create([
            'title' => 'Visi Kami',
            'key' => 'vision',
            'content' => '<h3>Visi</h3><p>Menjadi sekolah dasar terdepan yang menghasilkan alumni berkarakter, berkompetensi, dan berkontribusi positif bagi masyarakat dan bangsa.</p>',
        ]);
    }
}
