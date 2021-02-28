<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{

    protected $fillable = ['nama','merk','gambar'];

    public function products()
    {
        return $this->hasMany(Product::class, 'merk_id', 'id');
    }
}
