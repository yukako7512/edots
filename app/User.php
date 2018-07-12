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
    
    //     public function ongoing($eventId)
    // {
        
    //     $exist = $this->is_ongoinging($eventId);

    //     if ($exist) {
    //         // do nothing
    //         return false;
    //     } else {
            
    //         $this->events()->attach($eventId, ['status' => 'ongoing']);
    //         return true;
    //     }
    // }

    // public function dont_ongoing($eventId)
    // {
    //     $exist = $this->is_ongoinging($eventId);

    //     if ($exist) {
            
    //         \DB::delete("DELETE FROM events WHERE status = 'ongoing'", [$this->id, $eventId]);
    //     } else {
            
    //         return false;
    //     }
    // }

    // public function is_wanting($itemIdOrCode)
    // {
    //     if (is_numeric($itemIdOrCode)) {
    //         $item_id_exists = $this->want_items()->where('item_id', $itemIdOrCode)->exists();
    //         return $item_id_exists;
    //     } else {
    //         $item_code_exists = $this->want_items()->where('code', $itemIdOrCode)->exists();
    //         return $item_code_exists;
    //     }
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

     public function reviews_through_events()
    {
        return $this ->hasManyThrough(Review::class, Event::class);
    }  

     public function events_through_user_events()
    {
        return $this ->hasManyThrough(Event::class, UserEvent::class, 'user_id', 'id');
    }     
    
// リクエストのチェっク   
    // public function have_items()
    //     {
    //         return $this->items()->where('type', 'have');
    //     }
        
    public function request_check($event){
        $requesting_events = UserEvent::where('user_id', $this->id);
        $exist_or_not = $requesting_events->where('event_id', $event->id)->exists();
        return $exist_or_not;
    } 
}
