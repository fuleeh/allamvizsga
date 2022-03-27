<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_category_id',
        'photo_id',
        'title',
        'body',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function contentCategory()
    {
        return $this->belongsTo('App\ContentCategory');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function photoPlaceholder()
    {
        return "http://placehold.it/700x200";
    }
}
