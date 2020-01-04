<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static where(string $string, $id)
 */
class Pesanan extends Model
{
    protected $table = "pesanan";
    protected $primaryKey = "id";
    protected $fillable = ['id_user'];

    /**
     * @return HasMany
     */
    public function detail_pesanan(){
        return $this->hasMany('App\DetailPesanan','id_pesanan','id');
    }
    public function user(){
        return $this->hasOne('App\User','id','id_user');
    }
    public function meja(){
        return $this->hasOne('App\Meja','id','id_meja');
    }
}
