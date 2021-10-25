<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    //
    // protected $fillable = ['user_id', 'title', 'post_image', 'body'];

    use Sluggable;
    
    protected $guarded = [];

    // protected $fillable = ['title', 'body', 'post_image'];

    public function sluggable(): array
{
    return [
        'slug' => [
            'source' => 'title',
        ]
    ];
}

    public function user() {
        return $this->belongsTo('App\User');
    }

    // public function setPostImageAttribute($value) {

    //     $this->attributes['post_image'] = asset($value);

    // }

    public function getPostImageAttribute($value) {

        // return asset($value);

            if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
                return $value;
            }
         
            return asset('storage/' . $value);

        }

        public function comments() {
            return $this->hasMany('App\Comment');
        }
        
    }
