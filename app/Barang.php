<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{

    protected $fillable = [
        'nama',
        'jenis',
        'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo('\App\Customer');
    }

}
