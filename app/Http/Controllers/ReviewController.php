<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;

class ReviewController extends Controller
{
    public function create() {
        $reviews = new Review;
        
        $user_event = \Auth::user();

        $user_event = UserEvent::where('user_id', $user->id)->where('id', $id);
        
        $joining_events = $user_event->events_through_user_events->where('relationship','ongoing');
        $history_events = $user_event->events->where('relationship','done');
        
        $user_event->update(['relationship'=>'done']);
        
        return view('review.review', ['reviews' => $reviews,
                                    'user' => $user,
                                    'arranging_events'=> $arranging_events,
                                    'joining_events'=>$joining_events,
                                    'history_events'=>$history_events,]) ;
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