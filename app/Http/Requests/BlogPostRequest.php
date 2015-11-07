<?php

	namespace App\Http\Requests;

	class BlogPostRequest extends Request {

		public function authorize() {
			return TRUE;
		}

		public function rules() {
			return [
				'title' => 'required|min:5',
				'content' => 'required|min:10',
				'published_at' => 'required|date',
				'published_at_time' => 'required'
			];
		}
	}
