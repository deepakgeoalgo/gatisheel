<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installation extends Model
{
    use HasFactory;

    protected $fillable = [
    	'year',
    	'village_name',
    	'customer_name',
    	'model_type',
    	'customer_phone',
    	'installtion_address',
    	'installtion_machine_number',
    	'installtion_phone',
    	'installtion_date',
    	'image',
    	'invoice_value',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id' , 'id');
    }
}
