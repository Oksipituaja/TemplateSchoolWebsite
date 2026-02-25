<div>
<!-- Breadcrumb -->
<div class="pt-8 pb-8 bg-gradient-to-r from-blue-700 to-blue-600">
    <div class="container mx-auto px-6">
        <nav class="flex items-center space-x-2 text-white text-sm mb-4">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span>/</span>
            <span>Galeri Sekolah</span>
        </nav>
        <h1 class="font-display text-4xl font-bold text-white">Galeri Sekolah</h1>
        <p class="text-white/90 mt-2">Koleksi dokumentasi aktivitas dan kegiatan sekolah</p>
    </div>
</div>

<!-- Gallery Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <!-- Gallery Filter -->
        <div class="flex flex-wrap justify-center gap-3 mb-16">
            <button wire:click="$set('category', '')" 
                    class="px-6 py-2 rounded-full {{ $category === '' ? 'bg-blue-700 text-white' : 'bg-gray-200 text-gray-700' }} font-semibold hover:bg-blue-700 hover:text-white transition-all">
                Semua
            </button>
            @foreach($categories as $cat)
                <button wire:click="$set('category', '{{ $cat }}')" 
                        class="px-6 py-2 rounded-full {{ $category === $cat ? 'bg-blue-700 text-white' : 'bg-gray-200 text-gray-700' }} font-semibold hover:bg-blue-700 hover:text-white transition-all">
                    {{ ucfirst($cat) }}
                </button>
            @endforeach
        </div>

        <!-- Gallery Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            @forelse($galleries as $item)
                <div class="gallery-item group cursor-pointer">
                    <div class="relative overflow-hidden rounded-xl h-64 bg-gradient-to-br from-blue-100 to-blue-50 flex items-center justify-center group-hover:from-blue-150 group-hover:to-blue-100 transition">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        @else
                            <svg class="w-24 h-24 text-blue-300 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        @endif
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-colors duration-300 flex items-center justify-center">
                            <span class="text-white opacity-0 group-hover:opacity-100 transition-opacity text-lg font-semibold text-center px-4">{{ $item->title }}</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-bold text-lg text-gray-900">{{ $item->title }}</h3>
                        <p class="text-sm text-blue-700 font-medium">{{ ucfirst($item->category) }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-gradient-to-br from-blue-50 to-blue-100 p-12 rounded-lg text-center">
                    <svg class="w-16 h-16 text-blue-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16v-8a2 2 0 012-2h12a2 2 0 012 2v8"></path>
                    </svg>
                    <p class="text-gray-600 text-lg font-semibold">Tidak ada galeri untuk kategori ini</p>
                    <p class="text-gray-500 text-sm mt-2">Silakan pilih kategori lain atau lihat halaman utama</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            {{ $galleries->links() }}
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-700 to-blue-600 text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-6 text-center relative z-10">
        <h2 class="font-display text-4xl font-bold mb-6">Tertarik Bergabung?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto opacity-90">
            Jadilah bagian dari komunitas {{ config('app.name') }} dan rasakan pengalaman belajar yang luar biasa.
        </p>
        <a href="{{ route('ppdb') }}" class="inline-block bg-yellow-300 hover:bg-yellow-400 text-gray-900 font-bold py-4 px-8 rounded-xl shadow-lg transition-all hover:-translate-y-1 active:scale-95">
            Daftar PPDB 2026/2027
            <span class="ml-2">→</span>
        </a>
    </div>
</section></div>