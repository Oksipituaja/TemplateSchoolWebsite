<div>
    <!-- Hero Section -->
    <section class="relative pt-12 pb-20 bg-gradient-to-br from-blue-50/50 via-white to-yellow-50/20 overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 left-20 w-72 h-72 bg-blue-600 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-yellow-300 rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6 animate-fade-in">
                    <div class="inline-block px-4 py-2 bg-blue-700/10 rounded-full">
                        <span class="text-blue-700 font-semibold text-sm">🏆 Akreditasi A</span>
                    </div>
                    <h1 class="font-display text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                        Membentuk Generasi
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-blue-500">Unggul &
                            Berkarakter</span>
                    </h1>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        {{ config('app.name') }} berkomitmen memberikan pendidikan berkualitas dengan fasilitas modern
                        dan tenaga pendidik profesional untuk mengembangkan potensi anak Indonesia.
                    </p>
                    <div class="flex flex-wrap gap-4 pt-4">
                        <a href="{{ route('ppdb') }}" class="btn-primary">
                            Daftar Sekarang
                            <span class="ml-2">→</span>
                        </a>
                        <a href="{{ route('about') }}" class="btn-secondary">
                            Pelajari Lebih Lanjut
                            <span class="ml-2">→</span>
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-6 pt-8 border-t border-gray-200">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-blue-700">450+</div>
                            <div class="text-sm text-gray-600 mt-1">Siswa Aktif</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-blue-700">35+</div>
                            <div class="text-sm text-gray-600 mt-1">Guru Profesional</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-blue-700">25+</div>
                            <div class="text-sm text-gray-600 mt-1">Tahun Berpengalaman</div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div
                        class="absolute -inset-4 bg-gradient-to-r from-blue-600/20 to-yellow-300/20 rounded-3xl blur-2xl">
                    </div>

                    <!-- Hero Image jangan dirubah hero section pada image ini -->
                    <img src="{{ asset('hero_image.png') }}" alt="{{ config('app.name') }}"
                        class="relative rounded-3xl shadow-2xl w-full h-auto object-cover"
                        onerror="this.style.display='none'; document.querySelector('[data-fallback]').style.display='flex'">

                    <!-- Fallback Placeholder jangan dirubah hero section pada image ini-->
                    <div data-fallback
                        class="hidden relative rounded-3xl shadow-2xl w-full bg-gray-300 aspect-video flex items-center justify-center overflow-hidden">
                        <i class="fas fa-school text-7xl text-gray-500 opacity-30 absolute"></i>
                        <div class="text-gray-700 text-center z-10">
                            <h3 class="font-display text-2xl font-bold mb-2">{{ config('app.name') }}</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">Institusi Pendidikan dengan Fasilitas
                                Modern & Tenaga Profesional</p>
                        </div>
                    </div>


                    <div class="absolute -bottom-6 -right-6 bg-white p-4 rounded-2xl shadow-xl">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                                <span class="text-2xl">✓</span>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900">Terakreditasi A</div>
                                <div class="text-sm text-gray-600">Kualitas Terjamin</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sambutan Kepala Sekolah Section -->
    <section id="sambutan" class="py-20 bg-gradient-to-br from-blue-50 via-white to-indigo-50 relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-0 left-0 w-96 h-96 bg-blue-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-300 rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            @if($principalGreeting && !empty($principalGreeting->title))
                <div class="max-w-5xl mx-auto">
                    <!-- Section Label -->
                    <div class="text-center mb-8">
                        <span class="text-sm font-semibold tracking-widest uppercase text-blue-700">
                            Sambutan
                        </span>
                    </div>

                    <!-- Title -->
                    <h2 class="text-4xl md:text-5xl font-bold text-center mb-12 leading-tight text-gray-900">
                        {{ $principalGreeting->title }}
                    </h2>

                    <!-- Content Grid -->
                    <div class="grid lg:grid-cols-2 gap-12 items-center">
                        <!-- Text Content -->
                        <div class="space-y-6 order-2 lg:order-1">
                            <div class="text-gray-700 leading-relaxed line-clamp-4 text-base">
                                {!! Str::limit(strip_tags($principalGreeting->content), 500) !!}
                            </div>
                            <a href="{{ route('about') }}" class="inline-flex items-center px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl">
                                Pelajari Lebih Lanjut
                                <span class="ml-2">→</span>
                            </a>
                        </div>

                        <!-- Principal Image with Circular Frame -->
                        <div class="flex justify-center order-1 lg:order-2">
                            <div class="relative w-64 h-64 md:w-80 md:h-80">
                                <!-- Circular Background (Red) -->
                                <div class="absolute inset-0 bg-red-500 rounded-full shadow-2xl"></div>
                                
                                <!-- Image -->
                                <div class="absolute inset-4 size-full rounded-full overflow-hidden bg-gray-200 flex items-center justify-center">
                                    @if(!empty($principalGreeting->image))
                                        <img src="{{ asset('storage/' . $principalGreeting->image) }}" 
                                             alt="{{ $principalGreeting->title }}" 
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="flex flex-col items-center justify-center text-center">
                                            <i class="fas fa-user-tie text-7xl text-gray-400 opacity-60"></i>
                                            <p class="text-gray-500 text-sm mt-4">Foto tidak tersedia</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Fallback if no principal greeting data -->
                <div class="max-w-5xl mx-auto text-center py-8">
                    <p class="text-gray-500">Data Sambutan Kepala Sekolah belum ditambahkan di admin panel</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Teachers Section -->
    <section id="guru" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-blue-700 font-semibold text-sm uppercase tracking-wider">Tim Kami</span>
                <h2 class="font-display text-4xl font-bold text-gray-900 mt-4 mb-6">Tenaga Pendidik & Pengajar</h2>
                <p class="text-gray-600 leading-relaxed">
                    Guru-guru berpengalaman dan berdedikasi tinggi yang siap membimbing dan mengembangkan potensi setiap
                    siswa dengan penuh kasih sayang.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($teachers as $teacher)
                    <div class="teacher-card text-center">
                        <div class="w-32 h-32 bg-gradient-to-br from-blue-600 to-blue-400 rounded-full mx-auto mb-4 flex items-center justify-center text-5xl hover:scale-105 transition-transform duration-300 overflow-hidden">
                            @if($teacher->image)
                                <img src="{{ asset('storage/' . $teacher->image) }}" alt="{{ $teacher->name }}" class="w-full h-full object-cover">
                            @else
                                👨‍🏫
                            @endif
                        </div>
                        <h3 class="font-display text-xl font-bold text-gray-900">{{ $teacher->name ?? 'Guru' }}</h3>
                        <p class="text-blue-700 font-semibold mb-2">{{ $teacher->subject ?? 'Pendidik' }}</p>
                        <p class="text-gray-600 text-sm">Berdedikasi dalam memberikan pendidikan terbaik</p>
                    </div>
                @empty
                    <div class="col-span-full bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-xl text-center">
                        <svg class="w-12 h-12 text-blue-300 mx-auto mb-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 4.354a4 4 0 110 8.048M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2z">
                            </path>
                        </svg>
                        <p class="text-gray-600 font-semibold">Profil guru sedang dipersiapkan</p>
                        <p class="text-gray-500 text-sm mt-1">Kunjungi halaman guru untuk tim pengajar lengkap</p>
                    </div>
                @endforelse
            </div>

            <!-- View All Teachers Button -->
            <div class="text-center mt-12">
                <a href="{{ route('teachers') }}"
                    class="inline-flex items-center text-blue-700 hover:text-blue-800 font-semibold transition-colors group">
                    Lihat Semua Guru & Staff
                    <span class="ml-2 group-hover:translate-x-1 transition-transform">→</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section id="fasilitas" class="py-20 bg-gradient-to-br from-gray-50 to-blue-50/50">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-blue-700 font-semibold text-sm uppercase tracking-wider">Fasilitas</span>
                <h2 class="font-display text-4xl font-bold text-gray-900 mt-4 mb-6">Fasilitas Unggulan</h2>
                <p class="text-gray-600 leading-relaxed">
                    Kami menyediakan fasilitas modern dan lengkap untuk mendukung proses pembelajaran yang optimal.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($facilities as $facility)
                    <div class="facility-card group">
                        <div class="facility-image-wrapper h-64 bg-gradient-to-br from-blue-100 to-blue-50 flex items-center justify-center overflow-hidden rounded-t-2xl group-hover:from-blue-150 group-hover:to-blue-100 transition relative">
                            @if($facility->image)
                                <img src="{{ asset('storage/' . $facility->image) }}" alt="{{ $facility->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <svg class="w-20 h-20 text-blue-300 opacity-60 group-hover:scale-110 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4l2-3h2l2 3h4a2 2 0 012 2v14a2 2 0 01-2 2zM9 9h6m-6 4h6">
                                    </path>
                                </svg>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="font-display text-lg font-bold text-gray-900 mb-2">
                                {{ $facility->name ?? 'Fasilitas' }}</h3>
                            <p class="text-gray-600 text-sm">
                                {{ Str::limit($facility->description ?? 'Fasilitas unggulan kami', 100) }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-xl text-center">
                        <svg class="w-12 h-12 text-blue-300 mx-auto mb-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4l2-3h2l2 3h4a2 2 0 012 2v14a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        <p class="text-gray-600 font-semibold">Data fasilitas sedang dipersiapkan</p>
                        <p class="text-gray-500 text-sm mt-1">Lihat halaman fasilitas untuk informasi lengkap</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('facilities') }}"
                    class="inline-flex items-center bg-gradient-to-r from-blue-700 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg transition-all hover:-translate-y-1">
                    Lihat Semua Fasilitas
                    <span class="ml-2">→</span>
                </a>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section id="berita" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center mb-12 flex-col md:flex-row gap-8">
                <div>
                    <span class="text-blue-700 font-semibold text-sm uppercase tracking-wider">Berita Terkini</span>
                    <h2 class="font-display text-4xl font-bold text-gray-900 mt-2">Berita & Pengumuman</h2>
                </div>
                <a href="{{ route('news') }}"
                    class="text-blue-700 hover:text-blue-800 font-semibold flex items-center transition-colors">
                    Lihat Semua
                    <span class="ml-2">→</span>
                </a>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($latestNews as $news)
                    <div
                        class="h-full rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 bg-white flex flex-col group border border-gray-100">
                        <!-- Image -->
                        <div
                            class="h-56 bg-gradient-to-br from-blue-100 to-blue-50 flex items-center justify-center overflow-hidden group-hover:from-blue-150 group-hover:to-blue-100 transition relative">
                            @if ($news->featured_image)
                                <img src="{{ asset('storage/' . $news->featured_image) }}" alt="{{ $news->title }}"
                                    loading="lazy"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div
                                    class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-indigo-400 to-blue-500 text-white p-4">
                                    <span
                                        class="text-6xl font-bold opacity-80 mb-2">{{ strtoupper(substr($news->title, 0, 1)) }}</span>
                                    <p class="text-xs text-center line-clamp-2 max-w-xs">
                                        {{ substr($news->title, 0, 40) }}</p>
                                </div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="p-6 flex flex-col flex-1">
                            <!-- Date Badge -->
                            <span
                                class="text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1.5 rounded-full w-fit mb-4">
                                {{ $news->published_at?->format('d M Y') ?? 'Terbaru' }}
                            </span>

                            <!-- Title -->
                            <h3
                                class="font-display text-base font-bold text-gray-900 mb-4 line-clamp-2 group-hover:text-blue-700 transition leading-tight">
                                {{ $news->title }}
                            </h3>

                            <!-- Excerpt -->
                            <p class="text-gray-600 text-sm mb-6 flex-1 line-clamp-3 leading-relaxed">
                                {{ $news->excerpt ?? Str::limit(strip_tags($news->content), 100) }}
                            </p>

                            <!-- Divider -->
                            <div class="border-t border-gray-100 mb-4"></div>

                            <!-- Read More Link -->
                            <a href="{{ route('news.detail', $news->slug) }}"
                                class="inline-flex items-center group/link text-blue-600 hover:text-blue-800 font-semibold text-sm transition-all">
                                Baca Selengkapnya
                                <i
                                    class="fas fa-arrow-right ml-2 group-hover/link:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-xl text-center">
                        <svg class="w-12 h-12 text-blue-300 mx-auto mb-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        <p class="text-gray-600 font-semibold">Berita terbaru segera hadir</p>
                        <p class="text-gray-500 text-sm mt-1">Pantau halaman berita untuk informasi terkini</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="galeri" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-blue-700 font-semibold text-sm uppercase tracking-wider">Galeri Sekolah</span>
                <h2 class="font-display text-4xl font-bold text-gray-900 mt-4 mb-6">Dokumentasi Aktivitas</h2>
                <p class="text-gray-600 leading-relaxed">
                    Koleksi foto dan video dari berbagai kegiatan sekolah yang menunjukkan kehidupan akademik dan
                    non-akademik siswa kami.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                @forelse($galleries as $gallery)
                    <div class="gallery-item group cursor-pointer">
                        <div class="relative overflow-hidden rounded-xl h-60 bg-gradient-to-br from-blue-100 to-blue-50 flex items-center justify-center group-hover:from-blue-150 group-hover:to-blue-100 transition">
                            @if($gallery->image)
                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                            @else
                                <svg class="w-20 h-20 text-blue-300 opacity-60" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            @endif
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-colors duration-300 flex items-center justify-center">
                                <span class="text-white opacity-0 group-hover:opacity-100 transition-opacity text-lg font-semibold">{{ $gallery->title }}</span>
                            </div>
                        </div>
                        <p class="mt-3 font-semibold text-gray-900">{{ $gallery->title }}</p>
                    </div>
                @empty
                    <div class="col-span-full bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-xl text-center">
                        <svg class="w-12 h-12 text-blue-300 mx-auto mb-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4 16v-8a2 2 0 012-2h12a2 2 0 012 2v8"></path>
                        </svg>
                        <p class="text-gray-600 font-semibold">Galeri masih kosong</p>
                        <p class="text-gray-500 text-sm mt-1">Koleksi foto aktivitas sekolah segera hadir</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center">
                <a href="{{ route('gallery') }}" class="btn-primary">
                    Lihat Semua Galeri
                    <span class="ml-2">→</span>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-blue-700 to-blue-600 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-6 text-center relative z-10">
            <h2 class="font-display text-4xl font-bold mb-6">Daftarkan Anak Anda Sekarang!</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto opacity-90">
                Bergabunglah dengan {{ config('app.name') }} dan berikan pendidikan terbaik untuk masa depan anak Anda.
            </p>
            <a href="{{ route('ppdb') }}"
                class="inline-block bg-yellow-300 hover:bg-yellow-400 text-gray-900 font-bold py-4 px-8 rounded-xl shadow-lg transition-all hover:-translate-y-1 active:scale-95">
                Daftar PPDB 2026/2027
                <span class="ml-2">→</span>
            </a>
        </div>
    </section>
</div>
