<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nama
 * @property string $kode1
 * @property string $kode2
 * @property string $created_at
 * @property string $updated_at
 * @property Buku[] $bukus
 */
class Rak extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'rak';

    /**
     * @var array
     */
    protected $fillable = ['nama', 'kode1', 'kode2', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buku()
    {
        return $this->hasMany('App\Models\Buku', 'id_rak');
    }
}
