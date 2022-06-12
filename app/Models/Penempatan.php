<?php

namespace App\Models;

use App\Models\Bagian;
use App\Models\Barang;
use App\Models\Lokasi;
use App\Models\Pengadaan;
use App\Models\RiwayatPenempatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penempatan extends Model
{
    use HasFactory;

    protected $table = 'penempatan';
    protected $guarded = ['penempatan_id'];

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class);
    }

    public function bagian()
    {
        return $this->belongsTo(Bagian::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    public function riwayat_penempatan()
    {
        return $this->hasMany(RiwayatPenempatan::class);
    }
}