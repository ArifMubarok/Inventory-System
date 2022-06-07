<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $table = 'lokasi';
    protected $fillable = ['name', 'status', 'keterangan', 'status_aktif'];
    // protected $guarded = ['id'];

    
    public function penempatan() 
    {
        return $this->hasMany(Penempatan::class);
    }
}
