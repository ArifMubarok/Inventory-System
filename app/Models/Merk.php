<?php

namespace App\Models;

use App\Models\DataBarang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Merk extends Model
{
    use HasFactory;

    public function dataBarang()
    {
        return $this->hasMany(DataBarang::class);
    }
}
