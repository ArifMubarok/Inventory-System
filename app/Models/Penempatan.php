<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penempatan extends Model
{
    use HasFactory;

    protected $table = 'penempatan';
    protected $guarded = ['id'];

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

}
