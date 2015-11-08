<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class BlogPostCategory extends Model {


		protected $table = 'blog_post_category';

		protected $primaryKey =  ['blog_post_id', 'category_id'];

		protected $fillable = ['blog_post_id', 'category_id'];



	}
