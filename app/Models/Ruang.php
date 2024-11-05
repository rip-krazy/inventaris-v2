<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // Ruang model: App\Models\Ruang.php
    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }

}
