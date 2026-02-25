<?php

namespace App\Livewire\Pages;

use App\Models\News;
use App\Models\Gallery;
use App\Models\Facility;
use App\Models\Teacher;
use App\Models\Agenda;
use App\Models\About;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class Home extends Component
{
    public function render()
    {
        $latestNews = News::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        $galleries = Gallery::inRandomOrder()->limit(6)->get();
        $facilities = Facility::all();
        $teachers = Teacher::limit(3)->get();
        $agendas = Agenda::orderBy('event_date', 'asc')->limit(4)->get();
        
        // Get principal greeting for homepage
        $principalGreeting = About::where('key', 'principal_greeting')->first();

        return view('livewire.pages.home', [
            'latestNews' => $latestNews,
            'galleries' => $galleries,
            'facilities' => $facilities,
            'teachers' => $teachers,
            'agendas' => $agendas,
            'principalGreeting' => $principalGreeting,
        ]);
    }
}
