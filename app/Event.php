<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
     public function user()
    {
        return $this ->BelongsTo(User::class);
    }
    
     public function user_events()
    {
        return $this ->BelongsToMany(UserEvent::class);
    }
    
     public function transactions()
    {
        return $this ->BelongsToMany(Transaction::class);
    }
    
     public function reviews()
    {
        return $this ->hasMany(Review::class);
    } 
    
    public function users_through_reviews()
    {
        return $this ->hasManyThrough(User::class, Review::class, 'event_id', 'id');
    }    
    public function review_check ($my_event) {
        $exist_or_not = Review::where('event_id', $my_event->id)->exists();
        return $exist_or_not;
    }
}