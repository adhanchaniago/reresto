<?php

namespace App\Http\Controllers;

use App\Pesanan;
use App\Meja;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    public function setSession($user){
        Session::put('id_user',$user->id);
    }
    */

    public function index()
    {
        $data = Pesanan::with('user','detail_pesanan','meja')->get();
        return view('pesanan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $meja = Meja::all();
        return view('pesanan.create', compact('meja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */

    public function savestore(Request $request)
    {
        $pesanan = new Pesanan;
        $pesanan->id_user = $request->session()->get('id_user');
        $pesanan->id_meja = $request->input('id_meja');
        $pesanan->save();

        return $pesanan->id;

        /*
        $this->validate($request,[
            'id_meja' => 'required'
        ]);

        Pesanan::create([
            'id_user' => Session::get('id_user'),
            'id_meja' => $request->get('id_meja')
        ]);

        $id= $this->new($request);
        return redirect()->route('detail.index', $id);
        */
    }

    public function store(Request $request){

        $this->validate($request, [
            'id_meja' => 'required'
        ]);

        $id = $this->savestore($request);
        return redirect()->route('detail.index', $id)->with('sukses','Tambah Pesanan Berhasil!!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Pesanan  $pesanan
     * @return Response
     */
    public function show(Pesanan $pesanan)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pesanan  $pesanan
     * @return Factory|View
     */
    public function edit($id)
    {
        $meja = Meja::all();
        $data = Pesanan::where('id',$id)->with('meja')->first();
        return view('pesanan.edit', compact('data','meja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Pesanan  $pesanan
     * @return Response
     */
    public function saveupdate(Request $request, $id){

        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan->id_user = $request->session()->get('id_user');
        $pesanan->id_meja = $request->input('id_meja');
        $pesanan->save();

        return $pesanan->id;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_meja' => 'required|numeric'
        ]);

        $this->saveupdate($request, $id);
        return redirect()->route('pesanan.index')->with('sukses','Ubah Data Berhasil!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pesanan  $pesanan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Pesanan::findOrFail($id)->delete();
        return redirect()->route('pesanan.index')->with('sukses','Pesanan Berhasil Dihapus!!');
    }

    public function getJson($id)
    {
        $pesanan = Pesanan::where('id', $id)->with('detail_pesanan')->first();
        return response()->json($pesanan, 200);
    }

    public function getTotal($id)
    {
        $pesanan = Pesanan::where('id', $id)->with('detail_pesanan')->first();
        $total = 0;

        foreach ($pesanan->detail_pesanan as $detail) {
            $total += $detail->menu->harga * $detail->jumlah;
        }

        return response()->json($total);
    }
}
