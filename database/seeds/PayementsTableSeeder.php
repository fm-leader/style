<?php

use Illuminate\Database\Seeder;

class PayementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Payement::class,8)->create();
    }
}
