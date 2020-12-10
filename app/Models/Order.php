<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Return user for specific order
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    /**
     * Return product for specific order
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
