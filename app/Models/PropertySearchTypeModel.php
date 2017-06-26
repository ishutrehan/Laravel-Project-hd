<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertySearchTypeModel extends Model
{
	use SoftDeletes;

    protected $table = 'tbl_property_search_type';

	protected $fillable = [
		'search_type',
		'search_slug',
		'is_enabled',
	];

	// for soft delete
	protected $dates = ['deleted_at'];
}
