<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillablle = [
        'post_id',
        'author',
        'email',
        'body',
        'is_active',
    ];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function reply()
    {
        return $this->hasMany('App\CommentReply');
    }
}
