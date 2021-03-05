<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    protected $fillable = [
    	'refered_by',
    	'name',
    	'phone', 
    	'village',
    	'district',
    	'state',
    	'pincode',
    	'refered_phone'	
    ];
}
