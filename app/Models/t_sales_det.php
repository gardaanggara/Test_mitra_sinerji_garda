<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_sales_det extends Model
{
    use HasFactory;
    protected $fillable = [
        'sales_id', 
        'barang_id', 
        'voucher_id', 
        'shipping_cost_id', 
        'diskon_pct', 
        'diskon_nilai', 
        'harga_diskon', 
        'total', 
    ];
}
