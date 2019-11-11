<?php

use Illuminate\Database\Seeder;

class tiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos')->insert([
            'nome' => 'Apartamento',
        ]);
        DB::table('tipos')->insert([
            'nome' => 'Casa',
        ]);
        DB::table('tipos')->insert([
            'nome' => 'Sítio',
        ]);
        DB::table('tipos')->insert([
            'nome' => 'Andar',
        ]);
    }
}
