@extends('admin.layout')

@section('page_title', 'PPDB Registrations')
@section('page_subtitle', 'View student registration submissions')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h3 class="text-lg font-semibold text-gray-800">Student Registrations</h3>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Student Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Parent Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Phone</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($registrations as $reg)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $reg->student_name ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $reg->email ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $reg->phone ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $reg->created_at->format('M d, Y') }}</td>
                    <td class="px-6 py-4 text-sm space-x-2">
                        <a href="javascript:void(0)" onclick="showDetails({{ $reg->id }}, '{{ $reg->student_name }}', '{{ $reg->email }}', '{{ $reg->phone }}', '{{ $reg->parent_name ?? 'N/A' }}', '{{ $reg->parent_phone ?? 'N/A' }}')" class="text-blue-600 hover:text-blue-800"><i class="fas fa-eye"></i> View</a>
                        <form action="{{ route('admin.registrations.destroy', $reg) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this registration?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-6 py-8 text-center text-gray-500">No registrations found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $registrations->links() }}</div>

<!-- Modal for viewing details -->
<div id="detailsModal" style="display:none" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
        <h3 class="text-lg font-semibold mb-4">Registration Details</h3>
        <div id="modalContent" class="space-y-2 text-sm"></div>
        <button onclick="document.getElementById('detailsModal').style.display='none'" class="mt-4 px-4 py-2 bg-gray-300 text-gray-800 rounded">Close</button>
    </div>
</div>

<script>
function showDetails(id, name, email, phone, parent, parentPhone) {
    const modal = document.getElementById('detailsModal');
    const content = document.getElementById('modalContent');
    content.innerHTML = `
        <p><strong>Student Name:</strong> ${name}</p>
        <p><strong>Parent Name:</strong> ${parent}</p>
        <p><strong>Email:</strong> ${email}</p>
        <p><strong>Phone:</strong> ${phone}</p>
        <p><strong>Parent Phone:</strong> ${parentPhone}</p>
    `;
    modal.style.display = 'flex';
}
</script>
@endsection
