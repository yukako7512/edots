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
}
