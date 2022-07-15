<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pembayaran');
            $table->integer('barang_id')->nullable();
            $table->integer('user_id');
            $table->string('nama');
            $table->string('no_hp');
            $table->string('email');
            $table->string('alamat');
            $table->integer('total_harga');
            // $table->string('jenis_pembayaran');
            $table->string('status');
            // $table->string('transaksi_status');

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
        //
    }
}
