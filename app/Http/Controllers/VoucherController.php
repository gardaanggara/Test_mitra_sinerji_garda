<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\voucher;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_voucher = voucher::all();
        return view('dashboard_voucher', ['datavoucher' => $data_voucher]);
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
        $insert_voucher = new voucher;
        $insert_voucher->nama_voucher = $request->nama_diskon;
        $insert_voucher->harga = $request->harga_diskon;

        $insert_voucher->save();
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
        $edit_voucher = voucher::findOrFail($id);
        return view('dashboard_edit_voucher', ['edit' => $edit_voucher]);
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
        $update_voucher = voucher::findOrFail($id);
        $update_voucher->nama_voucher = $request->nama_edit;
        $update_voucher->harga = $request->harga_edit;

        $update_voucher->update();
        return redirect()->route('voucher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_voucher = voucher::find($id);
        $delete_voucher->delete();
        return back();
    }
}
