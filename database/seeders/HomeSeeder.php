<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Home::factory(20)->create();
    }
}
