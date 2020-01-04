<?php

namespace App\Http\Controllers;

use App\DetailPesanan;
use App\Pesanan;
use App\Menu;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class DetailPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $data = Pesanan::where('id',$id)->with('detail_pesanan')->first();
        return view('detail.index', compact('data','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $id
     * @return Factory|View
     */
    public function create($id)
    {
        $data = Menu::all();
        $data2 = Pesanan::where('id',$id)->with('detail_pesanan')->first();
        return view('detail.create', compact('data','id'), compact('data2','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request, $id)
    {
        $this->validate($request,[
            'id_menu' => 'required',
            'jumlah' => 'required',
        ]);

        DetailPesanan::create([
            'id_pesanan' => $id,
            'id_menu' => $request->get('id_menu'),
            'jumlah' => $request->get('jumlah')
        ]);
        return redirect()->route('detail.index',$id)->with('sukses','Tambah Detail Pesanan Berhasil!!');
    }

    /**
     * Display the specified resource.
     *
     * @param DetailPesanan $detailPesanan
     * @return Response
     */
    public function show(DetailPesanan $detailPesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id_pesanan
     * @param $id
     * @return Factory|View
     */
    public function edit($id_pesanan, $id)
    {
        $data = DetailPesanan::where('id',$id)->with('menu')->first();
        $data2 = Pesanan::where('id',$id)->with('detail_pesanan')->first();
        $menu = Menu::all();
        return view('detail.edit', compact('data','menu', 'id_pesanan'), compact('data2','id_pesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @param $id_pesanan
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function mupdate(Request $request, $id){
        $detail = DetailPesanan::where('id', $id)->first();
        $detail->id_menu = $request->input('id_menu');
        $detail->jumlah = $request->input('jumlah');
        $detail->save();
    }

    public function update(Request $request, $id, $id_pesanan)
    {
        $this->validate($request,[
            'id_menu' => 'required',
            'jumlah' => 'required',
        ]);

        /*
        DetailPesanan::where('id', $id)->first();
        (new \App\DetailPesanan)->update([
            'id_menu' => $request->get('id_menu'),
            'jumlah' => $request->get('jumlah')
        ]);
        */
        $this->mupdate($request,$id);
        return redirect()->route('detail.index', $id_pesanan)->with('sukses','Edit Detail Pesanan Berhasil!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DetailPesanan $detailPesanan
     * @return void
     */
    public function destroy(DetailPesanan $detailPesanan)
    {

    }
}
