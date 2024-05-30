<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->date('tanggal_peminjaman')->nullable();
            $table->date('tanggal_pengembalian')->nullable();
            $table->string('nomor_peminjaman')->nullable();
            $table->integer('total_buku')->nullable();
            $table->boolean('status_peminjaman');
            $table->integer('total_denda')->nullable();

            $table->unsignedBigInteger('id_anggota');
            $table->unsignedBigInteger('id_staf')->nullable();

            $table->timestamps();
            $table->foreign('id_staf')->references('id')->on('staf')->onDelete('cascade');
            $table->foreign('id_anggota')->references('id')->on('anggota')->onDelete('cascade');
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
};
