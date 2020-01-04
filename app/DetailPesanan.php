<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static create(array $array)
 */
class DetailPesanan extends Model
{
    protected $table = "detail_pesanan";
    protected $fillable = ['id_pesanan','id_menu', 'jumlah'];

    public function menu(){
        return $this->hasOne('App\Menu','id','id_menu');
    }
}
