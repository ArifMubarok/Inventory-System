<?php

namespace App\Models;

use App\Models\Supplier;
use App\Models\DataBarang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengadaan extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function supplier() 
    {
        return $this->belongsTo(Supplier::class);
    }

    public function databarang()
    {
        return $this->belongsTo(DataBarang::class);
    }

    public function penempatan()
    {
        return $this->hasMany(Penempatan::class);
    }
}