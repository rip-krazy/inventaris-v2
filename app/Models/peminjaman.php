<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'mapel',
        'barangtempat',
        'jam',
    ];

  // Relasi ke Barang
public function barang()
{
    return $this->belongsTo(Barang::class, 'barangtempat');
}

}
