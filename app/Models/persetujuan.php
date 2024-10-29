<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class persetujuan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'mapel', 'barangtempat', 'jam']; // Adjust according to your fields
}
