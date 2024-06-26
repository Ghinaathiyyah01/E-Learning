<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mapel;

class Modul extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'file',
        'deskripsi',
        'mapel_id',
    ];
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
