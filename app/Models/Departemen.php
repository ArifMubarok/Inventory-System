<?php

namespace App\Models;

use App\Models\User;
use App\Models\Bagian;
use App\Models\Pengadaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departemen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['bagian'];

    public function bagian()
    {
        return $this->hasMany(Bagian::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
    
    
}
