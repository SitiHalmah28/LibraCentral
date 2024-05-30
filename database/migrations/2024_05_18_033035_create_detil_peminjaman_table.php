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
        Schema::create('detil_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_peminjaman');
            $table->unsignedBigInteger('id_buku');
            $table->integer('denda')->nullable();
            $table->timestamps();

            $table->foreign('id_peminjaman')->references('id')->on('peminjaman')->onDelete('cascade');
            $table->foreign('id_buku')->references('id')->on('buku')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detil_peminjaman');
    }
};