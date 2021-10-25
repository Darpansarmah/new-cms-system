<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Reply extends Model
{
    //
    protected $guarded = [];

    public function comment() {
        return $this->belongsTo('App\Comment');
    }

}
