<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicador extends Model
{
    use HasFactory;

    protected $table = 'publicadores';

    //Segurança - Dados que podem ser preenchidos manualmente
    protected $fillable = [
        'nome',
        'obs'
    ];
}
