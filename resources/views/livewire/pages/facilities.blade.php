<div>
<!-- Breadcrumb -->
<div class="pt-8 pb-8 bg-gradient-to-r from-blue-700 to-blue-600">
    <div class="container mx-auto px-6">
        <nav class="flex items-center space-x-2 text-white text-sm mb-4">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span>/</span>
            <span>Fasilitas</span>
        </nav>
        <h1 class="font-display text-4xl font-bold text-white">Fasilitas Unggulan</h1>
        <p class="text-white/90 mt-2">Prasarana modern dan lengkap untuk mendukung pembelajaran optimal</p>
    </div>
</div>

<!-- Facilities Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($facilities as $facility)
                <div class="facility-card group">
                    <div class="relative h-64 bg-gradient-to-br from-blue-100 to-blue-50 flex items-center justify-center overflow-hidden rounded-t-2xl">
                        <svg class="w-24 h-24 text-blue-300 opacity-60 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4l2-3h2l2 3h4a2 2 0 012 2v14a2 2 0 01-2 2zM9 9h6m-6 4h6"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="font-display text-xl font-bold text-gray-900 mb-3">{{ $facility->name }}</h3>
                        <p class="text-gray-600 leading-relaxed text-sm">{{ Str::limit($facility->description, 150) }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-gradient-to-br from-blue-50 to-blue-100 p-12 rounded-2xl text-center">
                    <svg class="w-16 h-16 text-blue-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4l2-3h2l2 3h4a2 2 0 012 2v14a2 2 0 01-2 2z"></path>
                    </svg>
                    <p class="text-gray-600 text-lg font-semibold">Belum ada fasilitas yang ditambahkan</p>
                    <p class="text-gray-500 text-sm mt-2">Data fasilitas sedang dalam proses pembaruan</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-700 to-blue-600 text-white">
    <div class="container mx-auto px-6 text-center">
        <h2 class="font-display text-4xl font-bold mb-6">Kunjungi Sekolah Kami</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto opacity-90">
            Lihat langsung semua fasilitas modern kami dan bagaimana kami menciptakan lingkungan belajar yang inspiratif.
        </p>
        <a href="https://wa.me/628123456789" class="inline-block bg-yellow-300 hover:bg-yellow-400 text-gray-900 font-bold py-4 px-8 rounded-xl shadow-lg transition-all hover:-translate-y-1">
            Hubungi Kami
            <span class="ml-2">→</span>
        </a>
    </div>
</section>
</div>
