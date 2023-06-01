<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_customer;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cust = m_customer::all();
        return view('dashboard_customer', ['datacustomer' => $cust]);
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
        $insert_cust = new m_customer;
        $insert_cust->kode = $request->kode;
        $insert_cust->name = $request->name;
        $insert_cust->telp = $request->telp;

        $insert_cust->save();
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
        $edit_cust = m_customer::findOrFail($id);
        return view('dashboard_edit_customer', ['edit' => $edit_cust]);
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
        $update_cust = m_customer::findOrFail($id);
        $update_cust->kode = $request->kode_edit;
        $update_cust->name = $request->name_edit;
        $update_cust->telp = $request->telp_edit;

        $update_cust->update();
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_cust = m_customer::find($id);
        $delete_cust->delete();
        return back();
    }
}
