<?php

use Illuminate\Database\Seeder;

class EmployesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Employe::class,8)->create();
    }
}
