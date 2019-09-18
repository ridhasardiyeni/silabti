<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table='barangs';
    protected $primaryKey='id_barang';
    protected $fillable=['nama_barang','gbr_barang','merk','stok_barang','satuan','kondisi_barang','keterangan'];
}
