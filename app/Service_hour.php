<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service_hour extends Model
{
    //
    protected $table = 'service_hours';
    public $timestamps = true;
    protected $fillable = [
        'hours',
    ];
}
