<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UserEvent;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'personal_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function events()
    {
        return $this -> HasMany(Event::class);
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

     public function reviews_through_events()
    {
        return $this ->hasManyThrough(Review::class, Event::class);
    }  

     public function events_through_user_events()
    {
        return $this ->hasManyThrough(Event::class, UserEvent::class, 'user_id', 'id');
    }     
    
// リクエストのチェっク   
    public function have_items()
        {
            return $this->items()->where('type', 'have');
        }
        
    public function request_check($event){
        $requesting_events = UserEvent::where('user_id', $this->id);
        $exist_or_not = $requesting_events->where('event_id', $event->id)->exists();
        return $exist_or_not;
    } 
}
