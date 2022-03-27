<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $fillable = [
        'address', 'phone_number',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
