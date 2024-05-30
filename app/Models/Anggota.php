<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nama
 * @property string $nis
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property Peminjaman[] $peminjamen
 * @property Pengunjung[] $pengunjungs
 */
class Anggota extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'anggota';

    /**
     * @var array
     */
    protected $fillable = ['nama', 'nis', 'user_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function peminjaman()
    {
        return $this->hasMany('App\Models\Peminjaman', 'id_anggota');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pengunjung()
    {
        return $this->hasMany('App\Models\Pengunjung', 'id_anggota');
    }
}
