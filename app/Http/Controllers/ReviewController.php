<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;
use App\Event;
use App\UserEvent;
use App\User;
use App\Transaction;

class ReviewController extends Controller
{
    public function create($event_id, $attendiee_id) {
        
        $points = $this->point_sum();
        $notification = $this->notification();
        return view('review.review', ['attendiee_id' => $attendiee_id,
                                      'event_id' => $event_id,
                                      'points' => $points,
                                      'notification'=>$notification]) ;
    }
    
    public function reviewdone(Request $request, $event_id, $attendiee_id) {
        
        $request->validate([
        'rating' => 'required', 
        'comment' => 'required'               
      ]);
      
        $points = $this->point_sum();
        $notification = $this->notification();
        
        if(Review::where('user_id',$attendiee_id)->where('event_id', $event_id)->exists()){
            
            return redirect("user/$attendiee_id");
            
        }else
        
        {
            
        $reviews = new Review;
        $reviews->rating = $request->rating;
        $reviews->comment = $request->comment;
        $reviews->event_id = $event_id;
        $reviews->user_id = $attendiee_id;
        $reviews->save();
        
        $user_event = UserEvent::where('user_id', $attendiee_id)->where('event_id', $event_id);
        $user_event->update(['relationship'=>'done']);
        
        $transaction = new Transaction;
        $transaction->user_id = Event::where('id',$event_id)->value('user_id');
        $transaction->event_id = $event_id;
        $transaction->transactions = Event::where('id',$event_id)->value('point');
        $transaction->save();
        
        return view ('review.reviewdone'
        ,['attendiee_id' => $attendiee_id,
          'points' => $points,
          'notification'=>$notification]);
        }
            }
        
    public function review_history($id) {

        $points = $this->point_sum();
        $notification = $this->notification();
        $user = User::find($id);
        $my_events = $user->events()->orderBy('created_at', 'desc')->paginate(10);
        return view ('review.review_history', ['my_events' => $my_events,
                                                'points' => $points,
                                                'notification'=>$notification]);
    }
}