<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $fillable = ['name', 'description'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
    public function detailruangs()
{
    return $this->hasMany(DetailRuang::class);
}

public function barangs()
    {
        return $this->hasMany(Barang::class);
    }

}