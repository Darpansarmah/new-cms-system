<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\Reply;

class Comment extends Model
{
    //
    protected $guarded = [];

    public function post() {
        return $this->belongsTo('App\Post');
    }

    public function replies() {
        return $this->hasMany('App\Reply');
    }

}
