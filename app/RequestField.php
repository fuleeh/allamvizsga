<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestField extends Model
{
    protected $fillable = [
        'name',
        'type'
    ];
}
