<?php

namespace App\Http\Requests;


class PageRequest extends Request {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'language' => 'required',
            //'author' => 'required',
            'status' => 'required',
            'visibility' => 'required',
            //'slug' => 'required',
            'title' => 'required|min:4',
            'content' => 'required|min:10'
        ];
    }
}