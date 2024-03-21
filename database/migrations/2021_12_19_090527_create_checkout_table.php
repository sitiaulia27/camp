<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout', function (Blueprint $table) {
            $table->id();
            $table->integer('id_penyewa');
            $table->integer('id_produk');
            $table->string('name');
            $table->string('dp');
            $table->integer('total');
            $table->integer('jumlah');
            $table->string('identitas_diri');
            $table->date('tanggal_sewa');
            $table->date('tanggal_pengembalian');
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
        Schema::dropIfExists('checkout');
    }
}
