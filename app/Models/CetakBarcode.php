<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CetakBarcode extends Model
{
    use HasFactory;

    protected $table = 'cetak_barcode';

    protected $fillable = [
        'penempatan_id',
    ];

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
        return $this->belongsTo(Penempatan::class, 'penempatan_id', 'penempatan_id');
    }
}
