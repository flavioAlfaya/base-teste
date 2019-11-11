<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $hidden = [
        'created_at','updated_at'
    ];
    protected $fillable = [
        'nome',
    ];
}
