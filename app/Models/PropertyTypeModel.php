<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyTypeModel extends Model
{
	use SoftDeletes;

    protected $table = 'tbl_property_type';

	protected $fillable = [
		'unique_id',
		'property_type',
		'description',
	];

	// for soft delete
	protected $dates = ['deleted_at'];
}
