<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_customer;
use App\Models\m_barang;
use App\Models\voucher;
use App\Models\shipping_cost;
use App\Models\t_sales;
use App\Models\t_sales_det;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datacustomer = m_customer::all();
        $dataitem = m_barang::all();
        $datavoucher = voucher::all();
        $datashippingcost = shipping_cost::all();
        return view('dashboard', ['datacustomer' => $datacustomer, 'dataitem' => $dataitem, 'datavoucher' => $datavoucher, 'datashipping' => $datashippingcost]);
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
        //
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
        $datacustomer = m_customer::find($id);

        return [
            'success' => true,
            'data' => $datacustomer
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
