<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_anggota
 * @property integer $id_staf
 * @property string $tanggal_peminjaman
 * @property string $tanggal_pengembalian
 * @property string $nomor_peminjaman
 * @property integer $total_buku
 * @property integer $total_denda
 * @property string $created_at
 * @property string $updated_at
 * @property DetilPeminjaman[] $detilPeminjamen
 * @property DetilPeminjamanSementara[] $detilPeminjamanSementaras
 * @property Staf $staf
 * @property Anggotum $anggotum
 */
class Peminjaman extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'peminjaman';

    /**
     * @var array
     */
    protected $fillable = ['id_anggota', 'id_staf', 'tanggal_peminjaman', 'tanggal_pengembalian', 'nomor_peminjaman', 'status_peminjaman', 'total_buku', 'total_denda', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detilPeminjamen()
    {
        return $this->hasMany('App\Models\DetilPeminjaman', 'id_peminjaman');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detilPeminjamanSementaras()
    {
        return $this->hasMany('App\Models\DetilPeminjamanSementara', 'id_peminjaman');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function staf()
    {
        return $this->belongsTo('App\Models\Staf', 'id_staf');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function anggota()
    {
        return $this->belongsTo('App\Models\Anggota', 'id_anggota');
    }
}
