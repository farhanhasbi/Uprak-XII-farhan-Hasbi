<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $guarded = ['id'];
    protected $table = 'barangs';

    public function kategori()
    {
        return $this->belongsTo('App\Kategori');
    }

}
