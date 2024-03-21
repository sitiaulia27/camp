<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProdukMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema:: create("produk", function(Blueprint $table){
            $table->id();
            $table->String('nama');
            $table->String('jumlah_produk');
            $table->String('harga_sewa');
            $table->String('keterangan');
            $table->String('gambar');
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
        Schema::dropIfExists('produk');
    }
}   