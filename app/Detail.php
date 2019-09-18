<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table='details';
    protected $primaryKey='id_detail';
    protected $fillable=['id_trans','id_barang','jumlah','status'];

    public function trans(){
    	return $this->belongsTo('App\Trans','id_trans');
    }

    public function barang(){
    	return $this->belongsTo('App\Barang','id_barang');
    }
}
