<?php

namespace App\Models;

use App\Models\DataBarang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Satuan extends Model
{
    use HasFactory;

    protected $table = 'data_satuan';
    // protected $fillable = ['name', 'status'];
    protected $guarded = ['id'];

    public function dataBarang()
    {
        return $this->hasMany(DataBarang::class);
    }
}
