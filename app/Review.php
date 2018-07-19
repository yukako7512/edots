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
            $stars= '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_empty.png" alt="">'.
                    '<img src="/images/stars/star_empty.png" alt="">'.
                    '<img src="/images/stars/star_empty.png" alt="">'.
                    '<img src="/images/stars/star_empty.png" alt="">';

        }elseif ($review_round<1.75){
            $stars= '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_half.png" alt="">'.
                    '<img src="/images/stars/star_empty.png" alt="">'.
                    '<img src="/images/stars/star_empty.png" alt="">'.
                    '<img src="/images/stars/star_empty.png" alt="">';
        }elseif ($review_round<2.25){
            $stars= '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_empty.png" alt="">'.
                    '<img src="/images/stars/star_empty.png" alt="">'.
                    '<img src="/images/stars/star_empty.png" alt="">';
        }elseif ($review_round<2.75){
            $stars= '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_half.png" alt="">'.
                    '<img src="/images/stars/star_empty.png" alt="">'.
                    '<img src="/images/stars/star_empty.png" alt="">';
        }elseif ($review_round<3.25){
            $stars= '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_empty.png" alt="">'.
                    '<img src="/images/stars/star_empty.png" alt="">';
        }elseif ($review_round<3.75){
            $stars= '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_half.png" alt="">'.
                    '<img src="/images/stars/star_empty.png" alt="">';
        }elseif ($review_round<4.25){
            $$stars= '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_empty.png" alt="">';
        }elseif ($review_round<4.75){
            $stars= '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_half.png" alt="">';
        }elseif ($review_round>=4.75){
            $stars= '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_filled.png" alt="">'.
                    '<img src="/images/stars/star_filled.png" alt="">';
        }
        return $stars;
    }
}

