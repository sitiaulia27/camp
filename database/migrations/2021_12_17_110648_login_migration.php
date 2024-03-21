<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LoginMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema:: create("login", function (Blueprint $table) {
            $table->id();
            $table->string('nama') -> nullable();
            $table->string('username') -> nullable();
            $table->string('email') -> nullable();
            $table->string('password') -> nullable();
            $table->string('alamat') -> nullable();
            $table->string('telp') -> nullable();
            $table->integer('role') -> nullable();
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
        Schema::dropIfExists("login");
    }
}
