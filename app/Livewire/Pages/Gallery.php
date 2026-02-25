<?php

namespace App\Livewire\Pages;

use App\Models\Gallery as GalleryModel;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class Gallery extends Component
{
    public string $category = '';

    public function render()
    {
        $galleries = GalleryModel::when($this->category, function ($query) {
            $query->where('category', $this->category);
        })
        ->orderBy('created_at', 'desc')
        ->paginate(12);

        $categories = GalleryModel::distinct('category')
            ->pluck('category')
            ->toArray();

        return view('livewire.pages.gallery', [
            'galleries' => $galleries,
            'categories' => $categories,
        ]);
    }
}
