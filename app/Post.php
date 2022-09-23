<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    protected $fillable = ['post_title','post','user_id'];


    public function users()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
