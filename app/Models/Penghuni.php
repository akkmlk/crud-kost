<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    use HasFactory;

    protected $fillable = [
        'kamar_id',
        'nama_penghuni',
        'address',
        'penjamin',
    ];

    public function kamar() {
        return $this->belongsTo(kamar::class);
    }


}
