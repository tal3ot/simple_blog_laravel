<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index() //getting all genres to show on the right
    {
        return view('reviews.index', [
            'genres' => Genre::get(),
        ]);
    }

    public function show(Review $review) 
    {
        return view('reviews.show', [
            'review' => $review
        ]);
    }
}
