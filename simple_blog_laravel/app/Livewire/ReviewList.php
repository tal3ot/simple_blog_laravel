<?php

namespace App\Livewire;

use App\Models\Genre;
use App\Models\Review;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ReviewList extends Component
{
    use WithPagination;
    //like get to show the sort on the url and easy to users for sharing or bookmarking
    #[Url()]
    public $sort = 'desc';

    #[Url()]
    public $search = '';

    #[Url()]
    public $genre = '';

    #[Url()]
    public $popular = false;

    //sorting the reviews
    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc'; //to prevent user from writing any thing on the url

    }

    //in order for this to actually be called when the event in the searchBox file dispatched we have to listen for it and we do that using the anotations in live wire #on()

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search; 
    }

    public function clearFilters()
    {
        $this->search = "";
        $this->genre = "";
        redirect("/blog");
    }
    //computed properties are properties that defined as a function and they give you the ability to build to easily cache
    #[Computed()]
    public function reviews()
    {
        return Review::published()
            ->with('reviewer', 'genres') //eager loading for reduces the queries and gather them in one big query (reducing the number of requests)
            ->when($this->activeGenre, function ($query) {
                $query->withGenre($this->genre); 
            })
            ->when($this->popular, function ($query) { //count likes first by the built in function then order desc
                $query->withCount('likes')->orderBy('likes_count', "desc"); 
            })
            ->where('title', 'like', "%{$this->search}%") 
            ->orderBy('published_at', $this->sort)
            ->paginate(3);
    }

    #[Computed()]
    public function activeGenre()
    {
        if ($this->genre === null || $this->genre === '') { //for the eager loading (reducing the number of requests)
            //doing that as the computed anotation is only cashe the results if it's not null so if it null it go continue the process and do the fn above and called the fun above in other files so we chach it if null or empty
            return null;
        }
        return Genre::where('slug', $this->genre)->first();
    }

    public function render()
    {
        return view('livewire.review-list');
    }
}
