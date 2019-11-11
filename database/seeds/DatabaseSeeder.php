<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(tiposTableSeeder::class);
        $this->call(municipiosTableSeeder::class);
        $this->call(estadosTableSeeder::class);
        $this->call(bairrosTableSeeder::class);
    }
}
