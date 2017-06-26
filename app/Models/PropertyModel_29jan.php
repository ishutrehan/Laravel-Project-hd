<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyModel extends Model
{
	use SoftDeletes;

    protected $table = 'tbl_properties';

	protected $fillable = [
		'unique_id',
		'seller_id',
		'title',
		'description',
		'features',
		'property_type',
		'address',
		'state',
		'city',
		'zip_code',
		'property_images',
		'bedrooms',
		'bathrooms',
		'floors',
		'square_feet',
		'lot_square_feet',
		'pool',
		'in_city',
		'dis_from_main_city',
		'built_in_year',
		'estimated_payoff',
	];

	// for soft delete
	protected $dates = ['deleted_at'];
}
