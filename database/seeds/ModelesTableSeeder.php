<?php

use Illuminate\Database\Seeder;

class ModelesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Modele::class,8)->create();
    }
}
