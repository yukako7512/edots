<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Review;
use App\Transaction;
use App\Event;

class UserController extends Controller
{
    public function usershow($id){
        
        $user = User::find($id);
        $points = Transaction::where('user_id', $id)->sum('transactions');
        
        $my_reviews = $user->reviews_through_events();
        $review_avg = $my_reviews->avg('rating');
        $review_round = round($review_avg, 2);
        $review = new Review;
        $stars = $review->stars($review_round);
        
        $arranging_events = $user->events->where('status','ongoing');
        $joining_events = $user->events_through_user_events->where('relationship','ongoing');
        $history_events = $user->events->where('status','done');
        
        return view ('users.user', ['user' => $user,
                                    'review_round' => $review_round,
                                    'points' => $points,
                                    'arranging_events'=> $arranging_events,
                                    'joining_events'=>$joining_events,
                                    'history_events'=>$history_events,
                                    'stars' => $stars
                                    ]);
    }
    
    public function create($id){
        $introduction = new User;
        
        return view ('users.profileedit', ['introduction' => $introduction,
                                            'id' => $id]);
    }
    
    public function store(Request $request){
        $introduction = new User;
        $introduction->introduction = $request->introduction;
        $user = \Auth::user();
        $introduction->user_id=$user->id;
        $introduction->save();
        return view ('users.user', ['introduction' => $introduction,'user' => $user]);
    }

    public function editdone(Request $request, $id) {

        $user = \Auth::user();
        $user->introduction = $request->introduction;
        $user->save();
        
        return view ('review.reviewdone', ['user' => $user]);
    }
}
