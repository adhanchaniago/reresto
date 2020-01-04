<?php

use App\Pesanan;
use Illuminate\Database\Seeder;

class PesananTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pesanan::create([
            'id_user' => 1,
            'id_meja' => 1
        ]);
    }
}
