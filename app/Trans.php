<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trans extends Model
{
    protected $table='trans';
    protected $primaryKey='id_trans';
    protected $fillable=['kode_transaksi','user_id','tgl_pinjam','status'];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function detail(){
    	return $this->hasMany('App\Detail','id_trans','id_trans');
    }
}
