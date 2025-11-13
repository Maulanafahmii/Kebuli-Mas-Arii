<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataResto extends Model
{
    protected $table = 'data_resto';
    protected $fillable = ['nama', 'kategori', 'harga', 'keterangan', 'foto'];
    public $timestamps = true;

    /**
     * The attributes that should be cast.
     *
     * @var array<string
     */
    protected $casts = [
        'harga' => 'float',
    ];
}
