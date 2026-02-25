@extends('admin.layout')

@section('page_title', 'Gallery')
@section('page_subtitle', 'Manage gallery images')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h3 class="text-lg font-semibold text-gray-800">All Gallery Items</h3>
    <a href="{{ route('admin.galleries.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium">
        <i class="fas fa-plus mr-2"></i> Add Image
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Image</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Category</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($galleries as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="h-10 w-10 object-cover rounded">
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->title }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $item->category ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm space-x-2">
                        <a href="{{ route('admin.galleries.edit', $item) }}" class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('admin.galleries.destroy', $item) }}" method="POST" style="display:inline;" onsubmit="return confirm('Sure?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-6 py-8 text-center text-gray-500">No gallery items found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $galleries->links() }}</div>
@endsection
