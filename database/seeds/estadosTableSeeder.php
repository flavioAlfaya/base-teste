<?php

use Illuminate\Database\Seeder;

class estadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            'nome' => 'Rio de Janeiro',
        ]);
    }
}
