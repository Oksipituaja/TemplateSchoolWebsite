<?php

namespace App\Livewire\Pages;

use App\Models\Agenda as AgendaModel;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class Agenda extends Component
{
    public string $filter = 'upcoming';

    public function render()
    {
        $agendas = AgendaModel::when($this->filter !== 'all', function ($query) {
            $query->where('status', $this->filter);
        })
        ->orderBy('event_date', 'desc')
        ->paginate(10);

        return view('livewire.pages.agenda', [
            'agendas' => $agendas,
        ]);
    }
}
