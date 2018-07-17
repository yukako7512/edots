<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;
use App\Event;
use App\UserEvent;
use App\User;

class ReviewController extends Controller
{
    public function create($event_id, $attendiee_id) {
        $points = $this->point_sum();
        return view('review.review', ['attendiee_id' => $attendiee_id,
                                      'event_id' => $event_id,
                                      'points' => $points]) ;
    }
    
    public function reviewdone(Request $request, $event_id, $attendiee_id) {
        
        $points = $this->point_sum();
        $reviews = new Review;
        $reviews->rating = $request->rating;
        $reviews->comment = $request->comment;
        $reviews->event_id = $event_id;
        $attendiee = UserEvent::where('event_id', $event_id)->get();
        $reviews->user_id = $attendiee_id;
        $reviews->save();
        
        $user_event = UserEvent::where('user_id', $attendiee_id)->where('event_id', $event_id);
        $user_event->update(['relationship'=>'done']);
        
        return view ('review.reviewdone'
        ,['attendiee_id' => $attendiee_id,
          'points' => $points]);
    }
        
        public function review_history($id) {

        $points = $this->point_sum();
        $user = User::find($id);
        $my_events = $user->events()->orderBy('created_at', 'desc')->get();
        return view ('review.review_history', ['my_events' => $my_events,
                                                'points' => $points]);
    }
}