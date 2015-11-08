<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Category extends Model {

		protected $table = 'category';

		protected $primaryKey = 'category_id';

		protected $fillable = ['type','name','parent','url_friendly','description'];

		protected $hidden = ['category_id'];

		public $timestamps = false;

		public function scopeRetrieveBlogPost($query) {
			$query->where('type', 'Blog Post');
			$query->orderBy('name');
			return $query->get();
		}

		public function blogPost() {
			return $this->belongsToMany('App\BlogPost', 'blog_post_category','blog_post_id');
		}

		public static function type($type) {
			return Category::where('type', $type)->orderBy('name')->lists('name','category_id');
		}
	}