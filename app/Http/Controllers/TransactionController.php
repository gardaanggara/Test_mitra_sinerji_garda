<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\t_sales;
use App\Models\Cart;



class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Cart::all();

        if ($data) {
            return [
                'success' => true,
                'message' => 'Sukses get data',
                'data' => $data
            ];
        }

        return [
            'success' => false,
            'message' => 'Oops terjadi kesalahan',
            'data' => []
        ];
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
        $qty = $request->qty;
        $totalbayar = 0;
        $hargadiskon = 0;
        
        if ($request->diskon_voucher !== null || $request->diskon_shipping !== null) {
            $hargadiskon = $qty* $request->hargabandrol - $request->diskon_voucher;
            $totalbayar = ($qty * $request->hargabandrol + $request->diskon_shipping ) - ($request->diskon_voucher ?? 0);
        } else {
            $totalbayar = $qty * $request->hargabandrol;
        }

        DB::table('carts')->insert([
            'kode_barang' => $request->kode,
            'nama_barang' => $request->nama_barang,
            'qty' => $request->qty,
            'hargabandrol' => $request->hargabandrol,                 
            'diskon_voucher' => $request->diskon_voucher ?? 0,                 
            'diskon_shipping' => $request->diskon_shipping ?? 0,                 
            'harga_diskon'=> $hargadiskon,
            'total_bayar'=> $totalbayar,                 
        ]);

        return [
            'success' => true,
            'data' => null
        ];
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


    public function deletedb()
    {
        $deleted = DB::table('carts')->delete(); 
        return redirect()->back();
    }

    public function transaction()
    {
        DB::transaction(function () {
            // Query pertama
            DB::table('m_barangs')->insert([
                'column1' => 'value1',
                'column2' => 'value2',
            ]);
        
            // Query kedua
            DB::table('m_customers')->insert([
                'column1' => 'value3',
                'column2' => 'value4',
            ]);
        
            // Query ketiga
            DB::table('t_sales')->insert([
                'column1' => 'value5',
                'column2' => 'value6',
            ]);
        
            // Query keempat
            DB::table('t_sales_det')->insert([
                'column1' => 'value7',
                'column2' => 'value8',
            ]);
        });    
    }

    public function generateRandom()
    {
        $randomNumber = mt_rand(10000000000, 99999999999);
        return view('dashboard', ['randomNumber' => $randomNumber]);
    }

    public function storeTransaction(Request $request)
    {
        // dd($request->all());
        $transac_cust = new t_sales;
        $transac_cust -> kode = $request->code_transaction;
        $transac_cust -> tgl = $request->date_transaction;
        $transac_cust -> cust_id = $request->code_cust;
        $transac_cust -> subtotal = $request->subtotal ?? 0;
        $transac_cust -> diskon = $request->diskon ?? 0;
        $transac_cust -> ongkir = $request->ongkir ?? 0;
        $transac_cust -> total_bayar = $request->total_bayar ?? 0;
        
        $transac_cust->save();
        return [
            'success' => true,
            'messages' => 'succes tambah data transaksi',
        ];
        // return redirect()->back();        
    }
}
