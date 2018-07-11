<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;

class ReviewController extends Controller
{
    public function create() {
        $reviews = new Review;
        return view('review.review', ['reviews' => $reviews]) ;
    }
    
    public function store(Request $request) {
        $reviews = new Review;
        $reviews->rating = $request->rating;
        $reviews->comment = $request->comment;
        $reviews->event_id = Event::find($id);
        $user = \Auth::user();
        $reviews->user_id=$user->id;
        $reviews->save();
        return view ('review.reviewdone', ['reviews' => $reviews]);
    }
}