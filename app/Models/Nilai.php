<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    public function ujian()
    {
        return $this->belongsTo(Ujian::class, 'ujian_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
