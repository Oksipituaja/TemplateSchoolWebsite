<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class Terms extends Component
{
    public function render()
    {
        return view('livewire.pages.terms');
    }
}
