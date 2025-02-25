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
        'barang_tempat',
        'jam',
        'status',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_tempat');
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class);
    }
}

