<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBarang extends Model
{
    use HasFactory;

    protected $guarded = ['id_kategori'];

    public function getRouteKeyName()
    {
        return 'id_kategori';
    }
}
