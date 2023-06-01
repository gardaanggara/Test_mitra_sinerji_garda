<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 15);
            $table->string('nama_barang');
            $table->string('qty', 15);
            $table->decimal('hargabandrol');
            $table->string('diskon_voucher', 10);
            $table->decimal('diskon_shipping');
            $table->decimal('harga_diskon');
            $table->decimal('total_bayar');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
