<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['bagian'];

    public function bagian()
    {
        return $this->hasMany(Bagian::class);
    }
}
