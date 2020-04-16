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
        // $this->call(UsersTableSeeder::class);

        $this->call(EmployesTableSeeder::class);
        $this->call(ModelesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(CommandesTableSeeder::class);
        $this->call(ProgressionsTableSeeder::class);
        $this->call(LivraisonsTableSeeder::class);
        $this->call(PayementsTableSeeder::class);

        //factory(App\Employe::class,10)->create();
        //factory(App\Modele::class,20)->create();

    }
}
