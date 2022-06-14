<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporBarang extends Model
{
    use HasFactory;

    protected $table = 'lapor';

    // protected $casts = [
    //     'tanggal' => 'datetime:d-m-Y'
    // ];

    protected $fillable = 
    [
        'barang_id',
        'judul_laporan',
        'laporan',
        'status',
        'pelapor'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
