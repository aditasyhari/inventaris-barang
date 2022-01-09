<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman_barang', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah');
            $table->foreignId('peminjaman_id')->references('id')->on('peminjaman')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('barang_id')->references('id')->on('barang')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('peminjaman_barang');
    }
}
