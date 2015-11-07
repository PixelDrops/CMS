<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Category extends Model {

		protected $table = 'category';

		protected $primaryKey = 'category_id';

		protected $fillable = ['type','name','parent','url_friendly','description'];

		protected $hidden = ['category_id'];

		public $timestamps = false;

		public function scopeBlogPost($query) {
			$query->where('type', 'Blog Post');
			$query->orderBy('name');
			return $query->get();
		}
	}