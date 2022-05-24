<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'data_kategori';
    // protected $fillable = ['name', 'status'];
    protected $guarded = ['id'];

}