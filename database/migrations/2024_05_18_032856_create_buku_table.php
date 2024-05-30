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
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->string('kode')->nullable();
            $table->string('penulis')->nullable();
            $table->string('tahun_terbit')->nullable();
            $table->string('gambar')->nullable();
            $table->integer('jumlah_tersedia')->nullable();
            $table->longText('sinopsis')->nullable();
            $table->unsignedBigInteger('id_kategori')->nullable();
            $table->unsignedBigInteger('id_rak')->nullable();
            $table->timestamps();


            $table->foreign('id_kategori')->references('id')->on('kategori_buku')->onDelete('cascade');
            $table->foreign('id_rak')->references('id')->on('rak')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
};
