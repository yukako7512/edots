<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //  public function user()
    // {
    //     return $this ->Belongsto(User::class);
        
    // }
    
    // public function ongoing_user(){
    //     return $this->user()->where('status', 'ongoing');
    // }
    
    // public function done_user(){
    //     return $this->user()->where('status','done');
    // }
    
     public function user_events(){
        return $this ->BelongsToMany(UserEvent::class);
    }
     public function transactions()
    {
        return $this ->BelongsToMany(Transaction::class);
    }
     public function reviews()
    {
        return $this ->BelongsToMany(Review::class);
    }   
     public function user()
    {
        return $this ->BelongsTo(User::class);
    }    
}