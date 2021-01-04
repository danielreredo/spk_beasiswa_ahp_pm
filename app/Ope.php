<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ope extends Model
{
    protected $fillable = ['nm_ope', 'nidn', 'jk_ope', 'pro', 'user'];
    protected $primaryKey='id_ope';
    //
}
