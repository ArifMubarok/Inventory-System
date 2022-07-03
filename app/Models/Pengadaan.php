<?php

namespace App\Models;

use App\Models\Supplier;
use App\Models\DataBarang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengadaan extends Model
{
    use HasFactory;

    protected $table = 'pengadaan';
    protected $fillable = [
        'databarang_id',
        'supplier_id',
        'jumlah',
        'harga',
        'tanggal_pengadaan',
        'depresiasi',
        'lama_depresiasi',
        'keterangan',
        'total_harga'
    ];

    public function databarang()
    {
        return $this->belongsTo(DataBarang::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function penempatan()
    {
        return $this->hasMany(Penempatan::class);
    }

    public function laporbarang()
    {
        return $this->hasMany(LaporBarang::class);
    }
}