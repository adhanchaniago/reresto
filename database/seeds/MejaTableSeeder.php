<?php

use Illuminate\Database\Seeder;
use App\Meja;

class MejaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meja::create([
           'no_meja' => '1'
        ]);
        Meja::create([
            'no_meja' => '2'
        ]);
        Meja::create([
            'no_meja' => '3'
        ]);
        Meja::create([
            'no_meja' => '4'
        ]);
        Meja::create([
            'no_meja' => '5'
        ]);
        Meja::create([
            'no_meja' => '6'
        ]);
        Meja::create([
            'no_meja' => '7'
        ]);
        Meja::create([
            'no_meja' => '8'
        ]);
        Meja::create([
            'no_meja' => '9'
        ]);
        Meja::create([
            'no_meja' => '10'
        ]);
    }
}
