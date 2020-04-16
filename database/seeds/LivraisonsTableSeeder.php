<?php

use Illuminate\Database\Seeder;

class LivraisonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Livraison::class,8)->create();
    }
}
