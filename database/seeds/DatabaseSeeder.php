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
        $this->call(UserTableSeeder::class);
        $this->call(MejaTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(PesananTableSeeder::class);
    }
}
