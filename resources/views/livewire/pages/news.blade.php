<div>
<!-- Breadcrumb -->
<div class="pt-8 pb-8 bg-gradient-to-r from-blue-700 to-blue-600">
    <div class="container mx-auto px-6">
        <nav class="flex items-center space-x-2 text-white text-sm mb-4">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span>/</span>
            <span>Berita & Pengumuman</span>
        </nav>
        <h1 class="font-display text-4xl font-bold text-white">Berita & Pengumuman Sekolah</h1>
        <p class="text-white/90 mt-2">Informasi terkini tentang kegiatan dan pengumuman penting sekolah</p>
    </div>
</div>

<!-- News Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <!-- Search -->
        <div class="mb-12">
            <input type="text" 
                   wire:model.live="search" 
                   placeholder="🔍 Cari berita..." 
                   class="w-full px-6 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 bg-gray-50 transition">
        </div>

        <!-- News Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @forelse($news as $item)
                <div class="h-full rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 bg-white flex flex-col group border border-gray-100">
                    <!-- Image -->
                    <div class="h-56 bg-gradient-to-br from-blue-100 to-blue-50 flex items-center justify-center overflow-hidden group-hover:from-blue-150 group-hover:to-blue-100 transition relative">
                        @if($item->featured_image)
                            <img src="{{ asset('storage/' . $item->featured_image) }}" 
                                 alt="{{ $item->title }}" 
                                 loading="lazy"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-indigo-400 to-blue-500 text-white p-4">
                                <span class="text-6xl font-bold opacity-80 mb-2">{{ strtoupper(substr($item->title, 0, 1)) }}</span>
                                <p class="text-xs text-center line-clamp-2 max-w-xs">{{ substr($item->title, 0, 40) }}</p>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6 flex flex-col flex-1">
                        <!-- Date Badge -->
                        <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1.5 rounded-full w-fit mb-4">
                            {{ $item->published_at?->format('d M Y') ?? 'Terbaru' }}
                        </span>
                        
                        <!-- Title -->
                        <h3 class="font-display text-base font-bold text-gray-900 mb-4 line-clamp-2 group-hover:text-blue-700 transition leading-tight">
                            {{ $item->title }}
                        </h3>
                        
                        <!-- Excerpt -->
                        <p class="text-gray-600 text-sm mb-6 flex-1 line-clamp-3 leading-relaxed">
                            {{ $item->excerpt ?? Str::limit(strip_tags($item->content), 100) }}
                        </p>
                        
                        <!-- Divider -->
                        <div class="border-t border-gray-100 mb-4"></div>
                        
                        <!-- Read More Link -->
                        <a href="{{ route('news.detail', $item->slug) }}" class="inline-flex items-center group/link text-blue-600 hover:text-blue-800 font-semibold text-sm transition-all">
                            Baca Selengkapnya
                            <i class="fas fa-arrow-right ml-2 group-hover/link:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-gradient-to-br from-blue-50 to-blue-100 p-12 rounded-2xl text-center">
                    <svg class="w-16 h-16 text-blue-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <p class="text-gray-600 text-lg font-semibold">Tidak ada berita yang ditemukan</p>
                    <p class="text-gray-500 text-sm mt-2">Coba ubah kata kunci pencarian atau lihat kategori lain</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-12">
            <div class="space-x-2">
                {{ $news->links() }}
            </div>
        </div>
    </div>
</section>
</div>
