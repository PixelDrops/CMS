<?php

	namespace App\Http\Requests;

	class CategoryRequest extends Request {

		public function authorize() {
			return TRUE;
		}

		public function rules() {
			return [
				'name' => 'required|min:1',
			];
		}
	}
