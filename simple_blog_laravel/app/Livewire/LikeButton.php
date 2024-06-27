<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class LikeButton extends Component
{
    //this anotaion make whatever the value or review changes on the parent element it will also automatically change it on the child component 
    #[Reactive]
    public Review $review; 

    //to like a review
    public function toggleLike(){

        if (auth()->guest()) { // to check if the one who wanna make like is login or not
            return $this->redirect('/login', true);
        }

        $user = auth()->user();

        if ($user->hasLiked($this->review)) {
            $user->likes()->detach($this->review); //if he had liked before skip it
            return;
        }

        $user->likes()->attach($this->review); //if hadn't like make one

    }
    public function render()
    {
        return view('livewire.like-button');
    }
}
