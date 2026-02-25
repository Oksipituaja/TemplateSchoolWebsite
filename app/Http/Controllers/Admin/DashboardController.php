<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'news_count' => \App\Models\News::count(),
            'teachers_count' => \App\Models\Teacher::count(),
            'galleries_count' => \App\Models\Gallery::count(),
            'agendas_count' => \App\Models\Agenda::count(),
            'facilities_count' => \App\Models\Facility::count(),
            'registrations_count' => \App\Models\Registration::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
