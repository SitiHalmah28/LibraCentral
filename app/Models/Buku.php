<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_kategori
 * @property integer $id_rak
 * @property string $judul
 * @property string $kode
 * @property string $penulis
 * @property string $tahun_terbit
 * @property string $gambar
 * @property integer $jumlah_tersedia
 * @property string $sinopsis
 * @property string $created_at
 * @property string $updated_at
 * @property Rak $rak
 * @property KategoriBuku $kategoriBuku
 * @property DetilPeminjaman[] $detilPeminjamen
 * @property DetilPeminjamanSementara[] $detilPeminjamanSementaras
 */
class Buku extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'buku';

    /**
     * @var array
     */
    protected $fillable = ['id_kategori', 'id_rak', 'judul', 'kode', 'penulis', 'tahun_terbit', 'gambar', 'jumlah_tersedia', 'sinopsis', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rak()
    {
        return $this->belongsTo('App\Models\Rak', 'id_rak');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategoriBuku()
    {
        return $this->belongsTo('App\Models\KategoriBuku', 'id_kategori');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detilPeminjaman()
    {
        return $this->hasMany('App\Models\DetilPeminjaman', 'id_buku');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detilPeminjamanSementara()
    {
        return $this->hasMany('App\Models\DetilPeminjamanSementara', 'id_buku');
    }
}
