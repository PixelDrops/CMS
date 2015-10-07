<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Layout extends Model {

    protected $table = 'layout';

    protected $primaryKey = 'layout_id';

    protected $fillable = ['name', 'description', 'content'];

	protected $hidden = ['layout_id'];


	public function scopeAll($query) {
		$query->orderBy('created_at');
		return $query->get();
	}
}