<?php

	namespace App;

	use Carbon\Carbon;
	use Illuminate\Database\Eloquent\Model;

	class BlogPost extends Model {

		protected $table = 'blog_post';

		protected $primaryKey = 'blog_post_id';

		protected $fillable = ['language', 'parent_post', 'author', 'status', 'visibility', 'slug', 'title', 'sub_title', 'content', 'published_at'];

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

		public function author() {
			return $this->belongsTo('App\User', 'user_id');
		}

		public function categories() {
			return $this->belongsToMany('App\Category', 'blog_post_category', 'blog_post','category');
		}

		public function displayCategories() {
			$categories = '';
			foreach ($this->categories as $Category) {
				$categories .= $Category->name . '-';
			}
			return $categories;
		}


	}