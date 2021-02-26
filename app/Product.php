<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['nama','harga','merk_id','is_ready','jenis','berat','gambar'];

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'merk_id', 'id');
    }

    public function pesanan_details()
    {
        return $this->hasMany(PesananDetail::class, 'product_id', 'id');
    }


}
