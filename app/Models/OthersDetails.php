<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OthersDetails extends Model
{

    protected $table = 'order_details';
    protected $fillable = [
        'order_id',
        'product_id',
        'order_price',
        'qty',
        'order_subtotal',
    ];

    public function order()
    {
        return $this->belongsTo(Others::class, 'order_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
