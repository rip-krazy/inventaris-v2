<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPengembalian extends Model
{
    use HasFactory;
    protected $table = 'history_pengembalian'; // Nama tabel yang digunakan
    
    protected $fillable = [
        'name', 'tanggal_pengembalian', 'barang_tempat', 'mapel',
    ];
    
}

