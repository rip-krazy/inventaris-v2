<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan nama model (optional)
    protected $table = 'histories';  // misal tabel Anda bernama 'histories'

    // Tentukan kolom yang dapat diisi
    protected $fillable = ['item_id', 'action', 'admin_id', 'notes'];

    // Tentukan kolom yang akan di-cast (contoh: tanggal)
    protected $dates = ['created_at', 'updated_at'];

    
}

