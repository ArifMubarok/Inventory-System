<?php

namespace App\Models;

use App\Models\Pengadaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    public function pengadaan()
    {
        return $this->hasMany(Pengadaan::class);
    }
}
