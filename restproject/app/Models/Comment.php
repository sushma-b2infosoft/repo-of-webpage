<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    use HasFactory;

    protected $fillable = ['post_id', 'author', 'content'];

    // Each Comment belongs to one Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function commentable()
{
    return $this->morphTo();
}

}
