<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Opname extends Model
{
    protected $table = 'opname';

    protected $fillable = [
        'barang_id',
        'kondisi',
        'tanggal_opname',
        'keterangan',
    ];

    use HasFactory;

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
