<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaintextPassword extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'password',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}