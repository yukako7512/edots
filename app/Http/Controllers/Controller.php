<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use \App\Transaction;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function point_sum(){
        $user = \Auth::user();
        $points = Transaction::where('user_id', $user->id)->sum('transactions');
        return $points;
    }
    
    public function notification(){
        $user = \Auth::user();
        $unread_events = \DB::table('users')->join('user_events', 'users.id', '=', 'user_events.user_id')->join('events', 'user_events.event_id', '=', 'events.id')->select('user_events.user_id','user_events.event_id','title', 'name')->where('events.user_id' , "$user->id")->where('read', 'unread')->orderBy('date', 'asc')->paginate(50);
        
        $unread = $user->user_events_through_events()->where('read','unread')->get();
        $unread_count = count($unread);
        
        $notification = ['unread_events' => $unread_events, 'unread_count' => $unread_count];
        
        return $notification;
    }
    
    
    // public function unread_show(){
    //     $user = \Auth::user();
    //     $unread_events = $user->user_events()->where('read', 'unread')->get();
    //     return $unread_events;
    // }
}

