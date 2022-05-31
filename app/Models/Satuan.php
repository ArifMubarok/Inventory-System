<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;

    protected $table = 'data_satuan';
    // protected $fillable = ['name', 'status'];
    protected $guarded = ['id'];
}
