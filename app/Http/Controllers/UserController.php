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
        
        if($user->id%5==0){
            $icon="url1";
        }if($user->id%5==1){
            $icon="url2";
        }if($user->id%5==2){
            $icon="url3";
        }if($user->id%5==3){
            $icon="url4";
        }if($user->id%5==4){
            $icon="url5";
        };
        
        $arranging_events = $user->events()->where('status','ongoing')->orderBy('created_at', 'desc')->get();
        $joining_events = \DB::table('users')->join('user_events', 'users.id', '=', 'user_events.user_id')->join('events', 'user_events.event_id', '=', 'events.id')->select('*')->where('relationship', 'ongoing')->paginate(10);
        $joined_histories = \DB::table('users')->join('user_events', 'users.id', '=', 'user_events.user_id')->join('events', 'user_events.event_id', '=', 'events.id')->select('*')->where('relationship', 'done')->paginate(10);
        $arrnged_histories = $user->events->where('status','done');
      
        
        return view ('users.user', ['user' => $user,
                                    'review_round' => $review_round,
                                    'points' => $points,
                                    'arranging_events'=> $arranging_events,
                                    'joining_events'=>$joining_events,
                                    'joined_histories'=>$joined_histories,
                                    'arrnged_histories'=>$arrnged_histories,
                                    'stars' => $stars,
                                    'icon' => $icon,
                                    'points' => $points
                                    ]);
    }
    
    public function create($id){
        
        $points = $this->point_sum();
        $introduction = new User;
        
        return view ('users.profileedit', ['introduction' => $introduction,
                                            'id' => $id,
                                            'points' => $points]);
    }
    
    public function store(Request $request){
        
        $points = $this->point_sum();
        $introduction = new User;
        $introduction->introduction = $request->introduction;
        $user = \Auth::user();
        $introduction->user_id=$user->id;
        $introduction->save();
        return view ('users.user', ['introduction' => $introduction,
                                    'user' => $user,
                                    'points' => $points]);
    }

    public function editdone(Request $request, $id) {
        
        $points = $this->point_sum();
        $user = \Auth::user();
        $user->introduction = $request->introduction;
        $user->save();
        
        return redirect('review.reviewdone', ['user' => $user,
                                              'points' => $points]);
    }
}
