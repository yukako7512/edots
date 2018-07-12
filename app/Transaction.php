<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
     public function user()
    {
        return $this ->BelongsTo(User::class);
    }
     public function event()
    {
        return $this ->BelongsTo(Event::class);
    }
    // ポイントが足りてるか比べる
    static function points_compare($event){
        $me = \Auth::user();
        $my_points = Transaction::where('user_id', $me->id)->sum('transactions');
        $required_points = $event->point;
        
        if ($my_points >= $required_points){
            $negative_or_positive = true;
        }
        else{
            $negative_or_positive = false;
        };
        return $negative_or_positive;
    }
}
