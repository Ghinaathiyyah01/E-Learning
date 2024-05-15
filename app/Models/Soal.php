<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    protected $fillable = [
        'pertanyaan',
        'pilihan1',
        'pilihan2',
        'pilihan3',
        'pilihan4',
        'jawaban',
        'ujian_id',
    ];
}
