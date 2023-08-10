<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kamar extends Model
{
    use HasFactory;

    // protected $primaryKey = 'no_kamar';
    protected $fillable = [
        // 'nama_penghuni',
        // 'luas_kamar',
        // 'status',
        'jenis_kamar',
    ];

    // public function posts() {
    //     return $this->hashMany(Penghuni::class);
    // }

    // public function penghuni() {
    //     return $this->belongsTo(kamar::class);
    // }
}
