<div class="min-h-screen bg-white">
    <!-- Header -->
    <div class="bg-blue-600 text-white py-12 px-4">
        <div class="max-w-4xl mx-auto">
            <a href="/news" class="text-blue-100 hover:text-white mb-4 inline-block">← Kembali ke Berita</a>
            <h1 class="text-4xl font-bold">{{ $news->title }}</h1>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-4xl mx-auto py-16 px-4">
        <div class="mb-6">
            <p class="text-gray-500 text-sm">Dipublikasikan pada {{ \Carbon\Carbon::parse($news->published_at)->format('d M Y H:i') }}</p>
        </div>

        <div class="h-96 rounded-lg mb-8 overflow-hidden flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-50">
            @if($news->featured_image)
                <img src="{{ asset('storage/' . $news->featured_image) }}" 
                     alt="{{ $news->title }}" 
                     class="w-full h-full object-cover">
            @else
                <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-indigo-400 to-blue-500 text-white p-4">
                    <span class="text-6xl font-bold opacity-80 mb-2">{{ strtoupper(substr($news->title, 0, 1)) }}</span>
                    <p class="text-sm text-center line-clamp-2 max-w-xs">{{ substr($news->title, 0, 40) }}</p>
                </div>
            @endif
        </div>

        <div class="prose max-w-none">
            <div class="text-gray-800 leading-relaxed">
                {!! nl2br($news->content) !!}
            </div>
        </div>

        <div class="mt-12 pt-8 border-t border-gray-200">
            <a href="/news" class="text-blue-600 hover:text-blue-800 font-semibold">
                ← Kembali ke Berita
            </a>
        </div>
    </div>
</div>
