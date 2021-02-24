<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
    	'customer_name',
    	'village_name',    	
    	'model_type',
    	'responsible_service_person',
    	'warranty',
    	'refer_new_customer',
    	'warranty_renewal',
    	'image',
    ];
}
