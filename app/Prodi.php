<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table='prodis';
    protected $primaryKey='id_prodi';
    protected $fillable=['nama_prodi'];

}
