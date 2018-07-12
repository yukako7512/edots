<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
     public function user()
    {
        return $this ->BelongsTo(User::class);
    }
     public function event()
    {
        return $this ->BelongsTo(Event::class);
    }
    
// 星表示   
    public function stars($review_round)
    {
        if ($review_round<1.25){
            $stars='☆';
        }elseif ($review_round<1.75){
            $stars='☆'.'半分';
        }elseif ($review_round<2.25){
            $stars='☆'.'☆';
        }elseif ($review_round<2.75){
            $stars='☆'.'☆'.'半分';
        }elseif ($review_round<3.25){
            $stars='☆'.'☆'.'☆';
        }elseif ($review_round<3.75){
            $stars='☆'.'☆'.'☆'.'半分';
        }elseif ($review_round<4.25){
            $stars='☆'.'☆'.'☆'.'☆';
        }elseif ($review_round<4.75){
            $stars='☆'.'☆'.'☆'.'☆'.'半分';
        }elseif ($review_round>=4.75){
            $stars='☆'.'☆'.'☆'.'☆'.'☆';
        }
        return $stars;
    }
}

