<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $primaryKey = "user_id";

    protected $fillable = ['address', 'phone_number'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
