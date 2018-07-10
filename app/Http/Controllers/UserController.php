<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Review;

class UserController extends Controller
{
    public function usershow(){
        return view('users.user');
    }
    
    public function create(){
        $introduction = new User;
        
        return view ('users.profileedit', ['introduction' => $introduction]);
    }
    
    public function store(Request $request){
        $introduction = new User;
        $introduction->introduction = $request->introduction;
        $user = \Auth::user();
        $introduction->user_id=$user->id;
        $introduction->save();
        return view ('users.user', ['introduction' => $introduction,'user' => $user]);
    }
    
    public function editdone(){
        $reviews = new Review;
        
        return view ('users.user');
    }
}
