<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppraisersModel extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_appraisers';

	protected $casts = [
		'id_proof_attached' => 'int',
		// 'experience' => 'int',
		'contact' => 'int',
		'status' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'unique_id',
		'first_name',
		'last_name',
		'address',
		'state',
		'city',
		'zip_code',
		'email',
		'username',
		'password',
		'profile_pic',
		'id_proof_attached',
		'id_proof_attachment',
		'classification',
		'experience',
		'telephone',
		'mobile',
		'licensed_state',
		'license_number'
	];

	// for soft delete
	protected $dates = ['deleted_at'];
}
