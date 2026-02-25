@extends('admin.layout')

@section('page_title', 'Dashboard')
@section('page_subtitle', 'Overview of your school management system')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    <!-- News Stats -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">News & Articles</p>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['news_count'] }}</p>
            </div>
            <div class="text-4xl text-blue-500 opacity-20">
                <i class="fas fa-newspaper"></i>
            </div>
        </div>
        <a href="{{ route('admin.news.index') }}" class="mt-4 text-blue-600 text-sm hover:text-blue-800">
            Manage News →
        </a>
    </div>

    <!-- Teachers Stats -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Teachers</p>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['teachers_count'] }}</p>
            </div>
            <div class="text-4xl text-green-500 opacity-20">
                <i class="fas fa-chalkboard-user"></i>
            </div>
        </div>
        <a href="{{ route('admin.teachers.index') }}" class="mt-4 text-blue-600 text-sm hover:text-blue-800">
            Manage Teachers →
        </a>
    </div>

    <!-- Gallery Stats -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Gallery Items</p>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['galleries_count'] }}</p>
            </div>
            <div class="text-4xl text-purple-500 opacity-20">
                <i class="fas fa-images"></i>
            </div>
        </div>
        <a href="{{ route('admin.galleries.index') }}" class="mt-4 text-blue-600 text-sm hover:text-blue-800">
            Manage Gallery →
        </a>
    </div>

    <!-- Agenda Stats -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Agenda Items</p>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['agendas_count'] }}</p>
            </div>
            <div class="text-4xl text-yellow-500 opacity-20">
                <i class="fas fa-calendar"></i>
            </div>
        </div>
        <a href="{{ route('admin.agendas.index') }}" class="mt-4 text-blue-600 text-sm hover:text-blue-800">
            Manage Agenda →
        </a>
    </div>

    <!-- Facilities Stats -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Facilities</p>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['facilities_count'] }}</p>
            </div>
            <div class="text-4xl text-red-500 opacity-20">
                <i class="fas fa-building"></i>
            </div>
        </div>
        <a href="{{ route('admin.facilities.index') }}" class="mt-4 text-blue-600 text-sm hover:text-blue-800">
            Manage Facilities →
        </a>
    </div>

    <!-- Registrations Stats -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Registrations</p>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['registrations_count'] }}</p>
            </div>
            <div class="text-4xl text-indigo-500 opacity-20">
                <i class="fas fa-user-check"></i>
            </div>
        </div>
        <a href="{{ route('admin.registrations.index') }}" class="mt-4 text-blue-600 text-sm hover:text-blue-800">
            View Registrations →
        </a>
    </div>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Welcome to Admin Panel</h3>
    <p class="text-gray-600">
        Use the navigation on the left to manage all your school content. You can add, edit, and delete:
    </p>
    <ul class="list-disc list-inside text-gray-600 mt-3 space-y-1">
        <li>News articles and announcements</li>
        <li>Teacher information and profiles</li>
        <li>Photo gallery and events</li>
        <li>School agenda and events</li>
        <li>Facilities information</li>
        <li>School information and descriptions</li>
        <li>Student registrations</li>
    </ul>
</div>
@endsection
