<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Pesanan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Transaksi::with('pesanan')->get();
        return view('transaksi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Pesanan::all();
        return view('transaksi.create',compact('data'));
    }

    public function total($id){
        $data = Pesanan::where('id', $id)->with('detail_pesanan')->first();
        $total = 0;

        foreach ($data->detail_pesanan as $d) {
            $total += $d->menu->harga * $d->jumlah;
        }

        return $total;
    }

    public function bayar(Request $request){

        $transaksi = new Transaksi();
        $transaksi->id_pesanan = $request->input('id_pesanan');
        $transaksi->bayar = $request->input('bayar');
        $transaksi->save();

        /*
        Transaksi::create([
            $id_pesanan => $request->get('id_pesanan'),
            'bayar' => $request->get('bayar')
        ]);*/

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'id_pesanan' => 'required',
            'bayar' => 'required'
        ]);

        $total = $this->total($request->input('id_pesanan'));
        if ($request->input('bayar') < $total){
            return redirect()->back();
        }
        else{
            /*
            Transaksi::create([
                'id_pesanan' => $request->get('id_pesanan'),
                'bayar' => $request->get('bayar')
            ]);
            */
            $this->bayar($request);
            return redirect()->route('transaksi.index')->with('sukses','Pembayaran Berhasil!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
