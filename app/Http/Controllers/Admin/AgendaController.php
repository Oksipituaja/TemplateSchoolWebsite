<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AgendaController extends Controller
{
    public function index(): View
    {
        $agendas = Agenda::latest()->paginate(15);
        return view('admin.agendas.index', compact('agendas'));
    }

    public function create(): View
    {
        return view('admin.agendas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:agendas',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'location' => 'nullable|string',
            'status' => 'required|in:upcoming,ongoing,completed',
        ]);

        Agenda::create($validated);
        return redirect()->route('admin.agendas.index')->with('success', 'Agenda created successfully!');
    }

    public function edit(Agenda $agenda): View
    {
        return view('admin.agendas.edit', compact('agenda'));
    }

    public function update(Agenda $agenda, Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:agendas,slug,' . $agenda->id,
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'location' => 'nullable|string',
            'status' => 'required|in:upcoming,ongoing,completed',
        ]);

        $agenda->update($validated);
        return redirect()->route('admin.agendas.index')->with('success', 'Agenda updated successfully!');
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect()->route('admin.agendas.index')->with('success', 'Agenda deleted successfully!');
    }
}
