<?php

namespace App\Http\Controllers;

use App\Meja;
use App\Menu;
use App\Pesanan;
use App\Transaksi;
use App\User;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
            //$user = User::get();
            $menu = Menu::get();
            $meja = Meja::get();
            $pesanan = Pesanan::get();
            $transaksi = Transaksi::with('pesanan')->get();
            $trans = Transaksi::with('pesanan')->orderBy('created_at', 'desc')->take(5)->get();
            return view('home', compact('transaksi', 'pesanan','meja','menu','trans'));
    }
}
