<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailruang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'kondisi_barang'
    ];

    public function ruang()
{
    return $this->belongsTo(Ruang::class);
}

}
