<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skor_kri extends Model
{
    protected $fillable = ['kri', 'mah', 'skor'];
    protected $primaryKey='id_skor_kri';
    //
}
