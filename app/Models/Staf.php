<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_jabatan
 * @property string $nama
 * @property string $nis
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property Peminjaman[] $peminjamen
 * @property Jabatan $jabatan
 */
class Staf extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'staf';

    /**
     * @var array
     */
    protected $fillable = ['id_jabatan', 'nama', 'nis', 'user_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function peminjamen()
    {
        return $this->hasMany('App\Models\Peminjaman', 'id_staf');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jabatan()
    {
        return $this->belongsTo('App\Models\Jabatan', 'id_jabatan');
    }
}
