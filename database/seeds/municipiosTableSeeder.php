<?php

use Illuminate\Database\Seeder;

class municipiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('municipios')->insert([
            'nome' => 'Rio de Janeiro',
        ]);
        DB::table('municipios')->insert([
            'nome' => 'Nova Iguaçu',
        ]);
        DB::table('municipios')->insert([
            'nome' => 'Niteroi',
        ]);
    }
}
