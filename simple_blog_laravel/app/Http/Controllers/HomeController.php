<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('home', [
            //carbon is a package to manage working with time
            'featuredReviews' => Review::Published()->featured()->with('genres')->latest('published_at')->take(3)->get(), 
            'latestReviews' => Review::Published()->with('genres')->latest('published_at')->take(9)->get(), // with is for eager loading for reduces the queries and gather them in one big query (reducing the number of requests)
        ]);
    }
}