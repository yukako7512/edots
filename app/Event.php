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
        return $this ->BelongsToMany(Review::class);
    } 
    
    public function users_through_reviews()
    {
        return $this ->hasManyThrough(User::class, Review::class, 'event_id', 'id');
    }    
}