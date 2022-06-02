<?php

namespace App\Models;

use App\Models\DataBarang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;

    public function dataBarang()
    {
        return $this->hasMany(DataBarang::class);
    }
    protected $table = 'data_merk';
    // protected $fillable = ['name', 'status'];
    protected $guarded = ['id'];
}
