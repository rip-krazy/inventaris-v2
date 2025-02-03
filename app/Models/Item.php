<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['ruang_id', 'name', 'code', 'condition'];

    public function ruang()
    {
        return $this->belongsTo(Ruang::class);
    }
}