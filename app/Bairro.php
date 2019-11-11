<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    protected $hidden = [
        'created_at','updated_at'
    ];
    protected $fillable = [
        'nome',
    ];
}
