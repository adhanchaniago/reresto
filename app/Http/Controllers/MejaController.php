<?php

namespace App\Http\Controllers;

use App\Meja;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Meja::get();
        return view('meja.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('meja.create');
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
            'no_meja' => 'required'
        ]);

        Meja::create($request->all());

        return redirect()->route('meja.index')->with('sukses','Tambah Meja Berhasil!!');
    }

    /**
     * Display the specified resource.
     *
     * @param Meja $meja
     * @return void
     */
    public function show(Meja $meja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Meja $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $data = Meja::findOrFail($id);
        return view('meja.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Meja $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'no_meja' => 'required'
        ]);

        Meja::find($id)->update($request->all());

        return redirect()->route('meja.index')->with('sukses','Ubah Meja Berhasil!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Meja $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Meja::find($id)->delete();
        return redirect()->route('meja.index');
    }
}
