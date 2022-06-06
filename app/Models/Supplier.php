<?php

namespace App\Models;

use App\Models\Pengadaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'data_supplier';
    protected $guarded = ['id'];

    public function pengadaan()
    {
        return $this->hasMany(Pengadaan::class);
    }
}