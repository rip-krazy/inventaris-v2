<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'mapel',
        'barangtempat',
        'jam',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barangtempat');
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class);
    }
}

