<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mah extends Model
{
    protected $fillable = ['npm', 'nm_mah', 'pro', 'per', 'jk_mah'];
    protected $primaryKey = 'id_mah';
    //
}
