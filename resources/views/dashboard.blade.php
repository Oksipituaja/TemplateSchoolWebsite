@extends('layouts.app')

@section('title', 'Dashboard - SD Bangsri School')

@section('content')
<div class="min-h-screen bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-semibold text-gray-900">SD Bangsri School</h1>
                </div>
                <div class="flex items-center">
                    <span class="text-gray-700 mr-4">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="text-red-600 hover:text-red-700">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 py-8">
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">
                Welcome, {{ Auth::user()->name }}!
            </h2>
            <p class="text-gray-600">
                You are logged into the SD Bangsri School Management System.
            </p>

            <div class="mt-8 grid grid-cols-3 gap-4">
                <a href="/admin" class="p-4 bg-blue-50 border border-blue-200 rounded hover:bg-blue-100">
                    <h3 class="font-semibold text-blue-900">Admin Panel</h3>
                    <p class="text-sm text-blue-700">Manage content and users</p>
                </a>
                <a href="/" class="p-4 bg-green-50 border border-green-200 rounded hover:bg-green-100">
                    <h3 class="font-semibold text-green-900">View Website</h3>
                    <p class="text-sm text-green-700">See public content</p>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
