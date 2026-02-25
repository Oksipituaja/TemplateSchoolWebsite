<div class="min-h-screen bg-white">
    <!-- Header -->
    <div class="bg-blue-600 text-white py-12 px-4">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-4xl font-bold">Agenda</h1>
        </div>
    </div>

    <!-- Filter -->
    <div class="max-w-6xl mx-auto py-8 px-4">
        <div class="flex gap-4 mb-8">
            <button wire:click="$set('filter', 'all')" 
                    class="px-4 py-2 rounded-lg {{ $filter === 'all' ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
                Semua
            </button>
            <button wire:click="$set('filter', 'upcoming')" 
                    class="px-4 py-2 rounded-lg {{ $filter === 'upcoming' ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
                Mendatang
            </button>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-6xl mx-auto py-8 px-4 pb-16">
        <div class="space-y-6">
            @forelse($agendas as $agenda)
                <div class="bg-white border-l-4 border-blue-600 p-6 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-2">{{ $agenda->title }}</h3>
                    <p class="text-gray-600 mb-2">📅 {{ \Carbon\Carbon::parse($agenda->event_date)->format('d M Y H:i') }}</p>
                    <p class="text-gray-700">{{ $agenda->description }}</p>
                    <span class="inline-block mt-4 px-3 py-1 text-sm rounded-full {{ $agenda->status === 'upcoming' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                        {{ ucfirst($agenda->status) }}
                    </span>
                </div>
            @empty
                <div class="bg-gray-50 p-8 rounded-lg text-center">
                    <p class="text-gray-500">Tidak ada agenda untuk kategori ini</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $agendas->links() }}
        </div>
    </div>
</div>
