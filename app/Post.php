<?php

namespace App;
use App\User;
use App\Photo;
use App\ContentCategory;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
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

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    public function photoPlaceholder()
    {
        return "http://placehold.it/700x200";
    }
}
