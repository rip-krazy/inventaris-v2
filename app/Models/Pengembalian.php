<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalian';

    protected $fillable = [
        'nama',
        'mapel',
        'barangtempat',
        'jam',
        'status',
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

