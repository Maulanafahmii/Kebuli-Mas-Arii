<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_address',
        'menu_id',
        'quantity',
        'total_price'
    ];

    public function menu()
    {
        return $this->belongsTo(DataResto::class, 'menu_id');
    }
}
