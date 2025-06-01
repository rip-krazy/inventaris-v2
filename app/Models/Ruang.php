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


    public function isAvailable()
    {
        return !$this->description || !str_contains($this->description, 'Dipinjam');
    }
    
    /**
     * Update status ruangan
     */
    public function updateStatus($status, $user = null, $mapel = null, $jam = null)
    {
        if ($status === 'Dipinjam') {
            $this->description = "Dipinjam oleh {$user} untuk {$mapel} ({$jam})";
        } else {
            $this->description = 'Tersedia';
        }
        
        return $this->save();
    }

    // app/Models/Ruang.php
    public function setAvailable()
    {
        $this->description = 'Tersedia';
        $this->save();
        return $this;
    }

    public function setBorrowed($peminjam = null, $waktu = null)
    {
        $this->description = $peminjam ? "Dipinjam oleh $peminjam ($waktu)" : 'Sedang Dipinjam';
        $this->save();
        return $this;
    }

}