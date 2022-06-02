<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;

    protected $table = 'data_merk';
    // protected $fillable = ['name', 'status'];
    protected $guarded = ['id'];
}
