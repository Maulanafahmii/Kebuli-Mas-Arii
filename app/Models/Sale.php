<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';
    protected $fillable = ['branch_name', 'sale_date', 'menu_details', 'total_sales', 'notes'];
    protected $casts = [
        'menu_details' => 'array',
        'total_sales' => 'decimal:2',
        'sale_date' => 'date',
    ];
}
