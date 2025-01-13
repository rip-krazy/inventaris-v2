<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama_barang',
        'kode_barang',
<<<<<<< HEAD
        'kondisi_barang'
=======
        'kondisi_barang',
>>>>>>> ef2c56b9a8688d5dce8d3382a87582642fe2034c
    ];

}
