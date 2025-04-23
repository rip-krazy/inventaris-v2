<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'histories';

    protected $fillable = [
        'name',
        'mapel',
        'barang_tempat',
        'ruang_tempat',
        'tanggal_pengembalian',
        'status',
        'alasan',
        'type'
    ];
}
