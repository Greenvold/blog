<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'desc', 'body', 'user_id', 'published'];

    protected $with = ['author'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopePublished($query)
    {
        return Post::where('published', 'published')->orderBy('created_at', 'desc');
    }
}