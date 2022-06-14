<?php

namespace App\Models;

use App\Models\Satuan;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataBarang extends Model
{
    use HasFactory;

    protected $table = 'data_barang';
    protected $fillable = ['satuan_id', 'merk_id', 'kategori_id', 'name', 'keterangan', 'barcode', 'image'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function merk()
    {
        return $this->belongsTo(Merk::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function pengadaan()
    {
        return $this->hasMany(Pengadaan::class);
    }

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    public function laporbarang()
    {
        return $this->hasMany(LaporBarang::class);
    }
}
