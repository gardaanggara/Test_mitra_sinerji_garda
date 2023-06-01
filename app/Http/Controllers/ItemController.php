<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_barang;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = m_barang::all();
        return view('dashboard_item', ['dataitem' => $item]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert_item = new m_barang;
        $insert_item->kode = $request->kode;
        $insert_item->nama = $request->nama;
        $insert_item->harga = $request->harga;

        $insert_item->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_item = m_barang::findOrFail($id);
        return view('dashboard_edit_item', ['edit' => $edit_item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update_item = m_barang::findOrFail($id);
        $update_item->kode = $request->kode_edit;
        $update_item->nama = $request->nama_edit;
        $update_item->harga = $request->harga_edit;

        $update_item->update();
        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_item = m_barang::find($id);
        $delete_item->delete();
        return back();
    }
}
