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
    
    
    public function ongoing_events(){
        
        return $this->events()->where('status', 'ongoing');
    }
    
    
    public function done_events(){
        
        return $this->events()->where('status','done');
    }
  
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

     public function reviews_through_events()
    {
        return $this ->hasManyThrough(Review::class, Event::class, 'user_id', 'event_id');
    }  

     public function events_through_user_events()
    {
        return $this ->hasManyThrough(Event::class, UserEvent::class, 'user_id', 'id');
    }
    
         public function user_events_through_events()
    {
        return $this ->hasManyThrough(UserEvent::class, Event::class, 'user_id', 'event_id');
    }  
        
    public function request_check($event){
        $requesting_events = UserEvent::where('user_id', $this->id);
        $exist_or_not = $requesting_events->where('event_id', $event->id)->exists();
        return $exist_or_not;
    } 
    public static function int_p_check(){
        $user = \Auth::user();
        $exist_or_not = Transaction::where('user_id',$user->id)->where('event_id', 0)->exists();
        return $exist_or_not;
    }
}
