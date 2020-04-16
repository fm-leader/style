<?php

use Illuminate\Database\Seeder;

class ProgressionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Progression::class,8)->create();
    }
}
