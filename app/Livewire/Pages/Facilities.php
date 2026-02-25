<?php

namespace App\Livewire\Pages;

use App\Models\Facility as FacilityModel;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class Facilities extends Component
{
    public function render()
    {
        $facilities = FacilityModel::all();

        return view('livewire.pages.facilities', [
            'facilities' => $facilities,
        ]);
    }
}
