<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Modul;

class Mapel extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'gambar',
        'deskripsi',
        'user_id',
    ];
    public function moduls()
    {
        return $this->hasMany(Modul::class);
    }
    public function deskripsi()
    {
        return $this->deskripsi; 
    }
}
