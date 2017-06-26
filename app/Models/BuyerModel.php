<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BuyerModel extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_buyers';

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
        'marital_status',
        'spouse_name',
        'telephone',
        'mobile',
        'need_mortgage',
        'have_fund_proof',
        'fund_proof_attachment'
    ];

    // for soft delete
    protected $dates = ['deleted_at'];
}
