<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    protected $fillable = ['comment'];

    public function posts(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
