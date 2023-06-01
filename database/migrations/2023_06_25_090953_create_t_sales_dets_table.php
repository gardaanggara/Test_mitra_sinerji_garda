<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTSalesDetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_sales_dets', function (Blueprint $table) {
            $table->unsignedInteger('sales_id')->references('id')->on('t_sales')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('barang_id')->references('id')->on('m_barangs')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('voucher_id')->references('id')->on('vouchers')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('shiping_cost_id')->references('id')->on('shipping_costs')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('harga_bandrol');
            $table->integer('qty');
            $table->decimal('diskon_pct');
            $table->decimal('diskon_nilai');
            $table->decimal('harga_diskon');
            $table->decimal('total');
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
        Schema::dropIfExists('t_sales_dets');
    }
}
