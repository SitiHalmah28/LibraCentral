<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_peminjaman
 * @property integer $id_buku
 * @property integer $denda
 * @property string $created_at
 * @property string $updated_at
 * @property Peminjaman $peminjaman
 * @property Buku $buku
 */
class DetilPeminjamanSementara extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'detil_peminjaman_sementara';

    /**
     * @var array
     */
    protected $fillable = ['id_buku', 'denda', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buku()
    {
        return $this->belongsTo('App\Models\Buku', 'id_buku');
    }
}
