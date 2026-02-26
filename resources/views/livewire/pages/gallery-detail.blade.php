<div class="min-h-screen bg-white">
    <!-- Header -->
    <div class="bg-blue-600 text-white py-12 px-4">
        <div class="max-w-5xl mx-auto">
            <a href="{{ route('gallery') }}" class="text-blue-100 hover:text-white mb-4 inline-block">← Kembali ke Galeri</a>
            <h1 class="text-4xl font-bold">{{ $gallery->title }}</h1>
            <p class="text-blue-100 mt-2">Kategori: <span class="font-semibold">{{ ucfirst($gallery->category) }}</span></p>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-5xl mx-auto py-16 px-4">
        <!-- Main Image -->
        <div class="h-96 rounded-lg mb-12 overflow-hidden flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-50">
            @if($gallery->image)
                <img src="{{ asset('storage/' . $gallery->image) }}" 
                     alt="{{ $gallery->title }}" 
                     class="w-full h-full object-cover">
            @else
                <svg class="w-32 h-32 text-blue-300 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            @endif
        </div>

        <!-- Gallery Info -->
        <div class="bg-blue-50 rounded-lg p-6 mb-12">
            <h3 class="font-bold text-lg text-gray-900 mb-4">Informasi Galeri</h3>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <p class="text-gray-600 text-sm mb-1">Judul</p>
                    <p class="font-semibold text-gray-900">{{ $gallery->title }}</p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm mb-1">Kategori</p>
                    <p class="font-semibold text-blue-700">{{ ucfirst($gallery->category) }}</p>
                </div>
            </div>
            @if($gallery->description)
                <div class="mt-4 pt-4 border-t border-blue-200">
                    <p class="text-gray-600 text-sm mb-2">Deskripsi</p>
                    <p class="text-gray-900">{{ $gallery->description }}</p>
                </div>
            @endif
        </div>

        <!-- Related Gallery -->
        @if($relatedGalleries->count() > 0)
            <div class="mt-16 pt-8 border-t border-gray-200">
                <h3 class="font-bold text-2xl text-gray-900 mb-8">Galeri Lainnya - {{ ucfirst($gallery->category) }}</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($relatedGalleries as $related)
                        <a href="{{ route('gallery.detail', $related->slug) }}" class="group">
                            <div class="overflow-hidden rounded-lg bg-gradient-to-br from-blue-100 to-blue-50 h-48 flex items-center justify-center group-hover:from-blue-150 group-hover:to-blue-100 transition relative">
                                @if($related->image)
                                    <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                @else
                                    <svg class="w-16 h-16 text-blue-300 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                @endif
                                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-colors duration-300 flex items-center justify-center">
                                    <span class="text-white opacity-0 group-hover:opacity-100 transition-opacity text-sm font-semibold text-center px-4">{{ $related->title }}</span>
                                </div>
                            </div>
                            <h4 class="font-bold text-gray-900 mt-3 group-hover:text-blue-700 transition line-clamp-2">{{ $related->title }}</h4>
                            <p class="text-blue-700 font-medium text-sm mt-1">{{ ucfirst($related->category) }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Back Link -->
        <div class="mt-12 pt-8 border-t border-gray-200">
            <a href="{{ route('gallery') }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                ← Kembali ke Galeri
            </a>
        </div>
    </div>
</div>
