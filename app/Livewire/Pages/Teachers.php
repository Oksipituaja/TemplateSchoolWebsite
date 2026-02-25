<?php

namespace App\Livewire\Pages;

use App\Models\Teacher;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class Teachers extends Component
{
    public function render()
    {
        $teachers = Teacher::orderBy('created_at', 'desc')->paginate(12);

        return view('livewire.pages.teachers', [
            'teachers' => $teachers,
        ]);
    }
}
