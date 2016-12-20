<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    public $timestamps = true;
    protected $fillable = [
        'id_users',
        'tgl_pangkas',
        'waktu_pangkas',
        'id_layanans',
        'lokasi',
    ];
}
