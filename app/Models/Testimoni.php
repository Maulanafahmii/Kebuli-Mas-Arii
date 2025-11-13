<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimoni';

    protected $fillable = [
        'nama',
        'pesan',
        'rating',
        'pekerjaan',
        'foto',
    ];

public function getGambarUrlAttribute()
{
    // Jika sudah mengandung path 'assets/testimonies/', berarti sudah lengkap
    if ($this->foto && str_contains($this->foto, 'assets/')) {
        return asset($this->foto);
    }

    // Kalau hanya nama file saja, pakai default folder yang benar
    return $this->foto
        ? asset('assets/img/testimonies/' . $this->foto)
        : asset('assets/img/testimonies/default.png');
}


}
