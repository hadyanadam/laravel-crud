<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['nama', 'email', 'alamat', 'tempat_lahir', 'tanggal_lahir'];
    // protected $dateFormat= 'd-m-Y';
    protected $hidden = ['created_at', 'updated_at'];

    public function barangs(){
        return $this->hasMany('\App\Barang');
    }

}
