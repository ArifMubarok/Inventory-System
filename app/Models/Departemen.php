<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

    protected $table = 'departemen';
    // protected $fillable = ['name', 'status'];
    protected $guarded = ['id'];

    public function bagian()
    {
        return $this->hasMany(Bagian::class);
    }
}
