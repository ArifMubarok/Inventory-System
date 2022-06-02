<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    use HasFactory;

    protected $table = 'pengadaan';
    protected $fillable = ['databarang_id', 'supplier_id', 'kondisi', 'jumlah', 'harga', 'tanggal_pengadaan', 'depresiasi', 'lama_depresiasi', 'keterangan'];

    public function dataBarang()
    {
        return $this->belongsTo(DataBarang::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
