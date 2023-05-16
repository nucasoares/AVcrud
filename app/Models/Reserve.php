<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'endereco',
        'numero_de_quartos',
        'classificacao',
        'cafe',
        'user_id'
    ];
}
