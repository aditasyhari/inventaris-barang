<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('kelas', 45);
            $table->string('mapel', 45);
            $table->string('jam', 45);
            $table->datetime('tgl_pinjam');
            $table->datetime('tgl_kembali');
            $table->text('keterangan');
            $table->enum('persetujuan', ['disetujui', 'ditolak', 'pending'])->default('pending');
            $table->enum('status_kembali', ['selesai', 'belum', 'meminta'])->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('peminjaman');
    }
}
