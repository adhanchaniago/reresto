<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static get()
 * @method static create(array $all)
 * @method static findOrFail(Menu $id)
 * @method static find(Menu $id)
 */
class Menu extends Model
{
    protected $table = 'menu';
    protected $fillable = ['nama', 'harga','jenis_menu'];
}
