<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Review;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ReviewComments extends Component
{
    use WithFileUploads;
    use WithPagination;
    public Review $review; //to store which review we're commenting on

    

    #[Rule([ //the same as protected $rules = [
        'comment' => 'required|min:3',
        'comment_img' => 'nullable|image|max:5120', // Validation rules for the image
        ])]
        
    public string $comment= '';
    public $comment_img; // to handle image uploads



    public function reviewComment() {

        if (auth()->guest()) {
            return;
        }

        $this->validate();

        $imagePath = null;
        if ($this->comment_img) {
            $imagePath = $this->comment_img->store('comment_images', 'public');
        }

        $this->review->comments()->create([
            'comment' => $this->comment,
            'user_id' => auth()->id(),
            'comment_img' => $imagePath,
        ]);

        $this->reset(['comment', 'comment_img']); // Reset form inputs
    }

    #[Computed()]
    public function comments() {
        return $this?->review?->comments()->with('user')->latest()->paginate(5); //  "?" incase our review is null for some reason 
    } // with is for eager loading for reduces the queries and gather them in one big query (reducing the number of requests) and we pass the relationship between comments and review which is user (in models/comment file) to it

    public function render()
    {
        return view('livewire.review-comments');
    }
}
