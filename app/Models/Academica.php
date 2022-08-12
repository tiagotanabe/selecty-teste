<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academica extends Model
{
    use HasFactory;

    protected $fillable = [
        'instituicao',
        'curso',
        'inicio',
        'final',
        'candidatos_id'
    ];
}
