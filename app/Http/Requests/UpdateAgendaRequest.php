<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAgendaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:agendas,slug,'.$this->agenda->id,
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'event_time' => 'nullable',
            'location' => 'nullable|string',
            'status' => 'required|in:upcoming,ongoing,completed',
        ];
    }

    public function messages(): array
    {
        return [
            'event_date.required' => 'Tanggal event harus diisi.',
            'title.required' => 'Judul agenda harus diisi.',
            'status.in' => 'Status tidak valid.',
        ];
    }
}
