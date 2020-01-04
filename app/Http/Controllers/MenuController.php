<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

//use Illuminate\Http\Response;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Menu::get();
        return view('menu.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'harga' => 'required',
            'jenis_menu' => 'required'
        ]);

        Menu::create($request->all());

        return redirect()->route('menu.index')->with('sukses','Tambah Menu Berhasil!!');
    }

    /**
     * Display the specified resource.
     *
     * @param Menu $menu
     * @return void
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Menu $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $data = Menu::findOrFail($id);
        return view('menu.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Menu $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'harga' => 'required',
            'jenis_menu' => 'required'
        ]);

        Menu::find($id)->update($request->all());

        return redirect()->route('menu.index')->with('sukses','Ubah Menu Berhasil!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Menu $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Menu::find($id)->delete();
        return redirect()->route('menu.index')->with('sukses','Hapus Menu Berhasil!!');
    }
}
