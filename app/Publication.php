<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'publication_category_id',
        'photo_id',
        'title',
        'status',
        'body',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function publicationCategory()
    {
        return $this->belongsTo('App\PublicationCategory');
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
