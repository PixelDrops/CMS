<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {
    // http://ace.c9.io/
    protected $table = 'page';

    protected $primaryKey = 'page_id';

    protected $fillable = ['language', 'parent_page', 'author', 'status', 'visibility', 'slug', 'title', 'content',
        'description', 'keyword'];

    protected $hidden = ['page_id'];


    public function language() {
        return $this->belongsTo('App\FieldOption');
    }

    public function author() {
        return $this->belongsTo('App\User');
    }

    public function parentPage() {
        return $this->belongsTo('App\Page');
    }

    public function status() {
        return $this->belongsTo('App\FieldOption');
    }

    public function visibility() {
        return $this->belongsTo('App\FieldOption');
    }
}
