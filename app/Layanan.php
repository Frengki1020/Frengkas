<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    //
    protected $table = 'layanans';
    public $timestamps = true;
    protected $fillable = [
        'nama_layanans',
        'harga'
    ];
}
