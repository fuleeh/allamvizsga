<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BolusServing extends Model
{
    use HasFactory;

    protected $fillable = ['data_gathers_id', 'value'];
}
