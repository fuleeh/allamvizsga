<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGather extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'start_time', 'end_time', 'glucose_carbs_freq', 'bolus_serving_freq', 'activity'];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
