<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model {

    protected $table = 'blog_post';

    protected $primaryKey = 'blog_post_id';

    protected $fillable = ['language', 'parent_post', 'author', 'status', 'visibility', 'slug', 'title', 'sub_title',
        'content', 'published_at'];

    protected $hidden = ['blog_post_id'];

    protected $dates = ['published_at'];


    public function scopePublished($query) {
        $query->where('published_at', '<=', Carbon::now());
        $query->orderBy('published_at');
        return $query->get();
    }

    public function setPublishedAtAttribute($date) {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function postAuthor() {
        return $this->belongsTo('App\User','author','user_id');
    }

}