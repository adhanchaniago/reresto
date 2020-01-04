<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static get()
 * @method static create(array $all)
 * @method static findOrFail(Meja $id)
 * @method static find(Meja $id)
 */
class Meja extends Model
{
    protected $table = 'meja';
    protected $fillable = ['no_meja'];
}
