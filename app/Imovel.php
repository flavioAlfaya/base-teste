<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    protected $table = 'imoveis';
    protected $hidden = [
        'created_at','updated_at'
    ];
    protected $fillable = [
        'id',
        'endereco',
        'proprietario',
        'cep',
        'tipo_id',
        'estado_id',
        'municipio_id',
        'bairro_id'
    ];

    public function tipo()
    {
        return $this->hasOne('App\Tipo', 'id', 'tipo_id');
    }
    public function estado()
    {
        return $this->hasOne('App\Estado', 'id', 'estado_id');
    }
    public function municipio()
    {
        return $this->hasOne('App\Municipio', 'id', 'municipio_id');
    }
    public function bairro()
    {
        return $this->hasOne('App\Bairro', 'id', 'bairro_id');
    }
}
