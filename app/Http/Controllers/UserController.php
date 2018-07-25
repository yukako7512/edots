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
        $points = Transaction::where('user_id', \Auth::user()->id)->sum('transactions');
        
        $notification = $this->notification(); 
        
        $my_reviews = $user->reviews_through_events();
        $review_avg = $my_reviews->avg('rating');
        $review_round = round($review_avg, 2);
        $review = new Review;
        $stars = $review->stars($review_round);
        
        if($user->id%7==0){
            $icon="icon1.jpg";
        }if($user->id%7==1){
            $icon="icon2.jpg";
        }if($user->id%7==2){
            $icon="icon3.jpg";
        }if($user->id%7==3){
            $icon="icon4.jpg";
        }if($user->id%7==4){
            $icon="icon5.jpg";
        }if($user->id%7==5){
            $icon="icon6.jpg";
        }if($user->id%7==6){
            $icon="icon7.jpg";
        };
        
       $arranging_events = $user->events()->where('status','ongoing')->orderBy('date', 'desc')->get();
        $joining_events = \DB::table('users')->join('user_events', 'users.id', '=', 'user_events.user_id')->join('events', 'user_events.event_id', '=', 'events.id')->select('*')->where('user_events.user_id', $id)->where('relationship', 'ongoing')->orderBy('date', 'desc')->paginate(30);
        $joined_histories = \DB::table('users')->join('user_events', 'users.id', '=', 'user_events.user_id')->join('events', 'user_events.event_id', '=', 'events.id')->select('*')->where('user_events.user_id', $id)->where('relationship', 'done')->orderBy('date', 'desc')->paginate(30);
        $arrnged_histories = $user->events()->where('status','done')->orderBy('date', 'desc')->get();
      
        
        return view ('users.user', ['user' => $user,
                                    'review_round' => $review_round,
                                    'points' => $points,
                                    'notification' => $notification,
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
        $notification = $this->notification(); 
        $user = \Auth::user();
        
        return view ('users.profileedit', ['introduction' => $introduction,
                                            'id' => $id,
                                            'points' => $points,
                                            'user' => $user,
                                            'notification' => $notification,]);
    }
    
    // public function store(Request $request){
        
    //     $points = $this->point_sum();
    //     $introduction = new User;
    //     $introduction->introduction = $request->introduction;
    //     $user = \Auth::user();
    //     $introduction->user_id=$user->id;
    //     $introduction->save();
    //     return view ('users.user', ['introduction' => $introduction,
    //                                 'user' => $user,
    //                                 'points' => $points]);
    // }

    public function editdone(Request $request, $id) {
        
        $points = $this->point_sum();
        $user = \Auth::user();
        $user->introduction = $request->introduction;
        $user->save();
        
        return redirect("user/$id");
    }
    
    public function notification_read() {
        
        $user = \Auth::user();
        $events = $user->user_events_through_events()->where('read', 'unread')->get();
        foreach ($events as $event){
            $event->read = 'read';
            $event->save();
        }
            return redirect()->back();
    }
    
    public function point_history() {
        
        $points = Transaction::where('user_id', \Auth::user()->id)->sum('transactions');
        $notification = $this->notification(); 
        $transactions = Transaction::where('user_id', \Auth::user()->id)->orderBy('updated_at', 'desc')->get();
        
        return view ('users.point_history', ['transactions' => $transactions,
                                            'points' => $points,
                                            'notification' => $notification,]);
    }
}