<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa',
        'cargo',
        'atividades',
        'salario',
        'inicio',
        'fim',
        'candidatos_id'
    ];
}
