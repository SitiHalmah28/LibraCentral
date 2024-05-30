<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nama
 * @property string $kode
 * @property string $created_at
 * @property string $updated_at
 * @property Buku[] $bukus
 */
class KategoriBuku extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'kategori_buku';

    /**
     * @var array
     */
    protected $fillable = ['nama', 'kode', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bukus()
    {
        return $this->hasMany('App\Models\Buku', 'id_kategori');
    }
}
