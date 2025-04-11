<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Others extends Model
{
    //

    public function orderDetails()
    {
        return $this->belongsTo(OthersDetails::class, 'order_id', 'id');
    }
}
