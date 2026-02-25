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

        <div class="bg-gray-200 h-96 rounded-lg mb-8 flex items-center justify-center">
            <span class="text-gray-400">Gambar Berita</span>
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
