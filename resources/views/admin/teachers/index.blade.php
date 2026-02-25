@extends('admin.layout')

@section('page_title', 'Teachers')
@section('page_subtitle', 'Manage teacher information')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h3 class="text-lg font-semibold text-gray-800">All Teachers</h3>
    <a href="{{ route('admin.teachers.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium">
        <i class="fas fa-plus mr-2"></i> Add Teacher
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Subject</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Phone</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($teachers as $teacher)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $teacher->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $teacher->email }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $teacher->subject ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $teacher->phone ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm space-x-2">
                        <a href="{{ route('admin.teachers.edit', $teacher) }}" class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('admin.teachers.destroy', $teacher) }}" method="POST" style="display:inline;" onsubmit="return confirm('Sure?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-6 py-8 text-center text-gray-500">No teachers found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $teachers->links() }}</div>
@endsection
