<?php

use Illuminate\Database\Seeder;
use App\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
           'nama' => 'Ayam Goreng',
           'harga' => '12000',
           'jenis_menu' => 'Makanan'
        ]);
        Menu::create([
            'nama' => 'Nasi Goreng',
            'harga' => '10000',
            'jenis_menu' => 'Makanan'
        ]);
        Menu::create([
            'nama' => 'Es Teh',
            'harga' => '2000',
            'jenis_menu' => 'Minuman'
        ]);
        Menu::create([
            'nama' => 'Es Jeruk',
            'harga' => '3000',
            'jenis_menu' => 'Minuman'
        ]);
        Menu::create([
            'nama' => 'Rawon',
            'harga' => '8000',
            'jenis_menu' => 'Makanan'
        ]);

    }
}
