<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->json('POST', '/imovel/create', 
        [
            'endereco' => 'Rua teste, 333',
            'proprietario'=>'proprietario teste',
            'cep'=>'11111-111',
            'tipo_id'=>1,
            'estado_id'=>1,
            'municipio_id'=>1,
            'bairro_id'=>1,
        ])
             ->seeJson([
                 'created' => true,
             ]);
    }
}
