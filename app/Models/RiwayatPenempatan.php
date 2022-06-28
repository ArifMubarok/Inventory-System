<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPenempatan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_penempatan';

    protected $guarded = ['id'];

    public function penempatan()
    {
        return $this->belongsTo(Penempatan::class, 'penempatan_id', 'penempatan_id');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
}