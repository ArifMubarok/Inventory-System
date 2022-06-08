<?php

namespace App\Models;

use App\Models\Pengadaan;
use App\Models\DataBarang;
use App\Models\Penempatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    protected $table = 'barang';

    use HasFactory;

    public function databarang()
    {
        return $this->belongsTo(DataBarang::class);
    }

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class);
    }

    public function penempatan()
    {
        return $this->belongsTo(Penempatan::class, 'barang_id', 'penempatan_id');
    }
}
