<?php

namespace App\Livewire\Pages;

use App\Models\News as NewsModel;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class News extends Component
{
    #[Url]
    public string $search = '';

    public function render()
    {
        $news = NewsModel::where('status', 'published')
            ->when($this->search, function ($query) {
                $query->where('title', 'like', "%{$this->search}%")
                    ->orWhere('content', 'like', "%{$this->search}%");
            })
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        return view('livewire.pages.news', [
            'news' => $news,
        ]);
    }
}
