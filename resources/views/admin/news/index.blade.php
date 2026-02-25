@extends('admin.layout')

@section('page_title', 'News & Articles')
@section('page_subtitle', 'Manage news and articles for your school')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h3 class="text-lg font-semibold text-gray-800">All News Articles</h3>
    <a href="{{ route('admin.news.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium">
        <i class="fas fa-plus mr-2"></i> Add New Article
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Published</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Author</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($news as $article)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <a href="{{ route('admin.news.edit', $article) }}" class="text-blue-600 hover:text-blue-800">
                                {{ $article->title }}
                            </a>
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-3 py-1 rounded-full text-xs font-medium {{ $article->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ ucfirst($article->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $article->published_at?->format('d M Y') ?? '-' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $article->user->name ?? 'Unknown' }}
                        </td>
                        <td class="px-6 py-4 text-sm space-x-2">
                            <a href="{{ route('admin.news.edit', $article) }}" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.news.destroy', $article) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                            No news articles found. <a href="{{ route('admin.news.create') }}" class="text-blue-600 hover:text-blue-800">Create one</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-6">
    {{ $news->links() }}
</div>
@endsection
