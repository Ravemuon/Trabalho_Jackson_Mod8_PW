<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory; // permite usar factories do Laravel

    // CAMPOS QUE PODEM SER PREENCHIDOS EM MASSA
    protected $fillable = ['nome', 'email', 'mensagem'];
}
