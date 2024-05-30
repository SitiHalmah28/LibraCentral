<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_anggota
 * @property string $tanggal
 * @property string $keterangan
 * @property string $created_at
 * @property string $updated_at
 * @property Anggotum $anggotum
 */
class Pengunjung extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pengunjung';

    /**
     * @var array
     */
    protected $fillable = ['id_anggota', 'tanggal', 'keterangan', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function anggota()
    {
        return $this->belongsTo('App\Models\Anggota', 'id_anggota');
    }
}
