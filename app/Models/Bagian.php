<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    use HasFactory;

    protected $table= 'bagian';
    protected $fillable = ['name', 'status', 'keterangan', 'status_aktif', 'departemen_id'];

    public function departemen() 
    {
        return $this->belongsTo(Departemen::class);
    }

    public function penempatan() 
    {
        return $this->hasMany(Penempatan::class);
    }
}