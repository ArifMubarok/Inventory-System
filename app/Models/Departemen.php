<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

    protected $table = 'data_departemen';
    // protected $fillable = ['name', 'status'];
    protected $guarded = ['id'];
}
