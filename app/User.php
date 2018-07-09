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
    {return $this -> HasMany(Event::class);
    }    public function have_items()
        {
            return $this->items()->where('type', 'have');
        }
        
    public function request_check($event){
        $requesting_events = UserEvent::where('user_id', $this->id);
        $exist_or_not = $requesting_events->where('event_id', $event->id)->exists();
        return $exist_or_not;
    } 
    
}
