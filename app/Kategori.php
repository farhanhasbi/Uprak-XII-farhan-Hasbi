<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
	protected $guarded = ['id'];
    protected $table = 'kategoribarangs';

    public function barang()
    {
    	return $this->hasMany('App\Barang', 'tipe_barang', 'id');
    }
}
