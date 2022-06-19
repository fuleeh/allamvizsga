<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    protected $fillable = ['patient_category_id', 'doctor_id','first_name', 'last_name', 'address', 'phone_number'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
