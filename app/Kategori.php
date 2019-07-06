<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['nama_kategori', 'slug'];
    public $timestamps = true;

    public function artikel()
    {
        return $this->hasMany('App\Artikel', 'kategori_id');
    }
}
