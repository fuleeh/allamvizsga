<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invites extends Model
{
    protected $fillable = [
        'email',
        'role_id'
    ];
}
