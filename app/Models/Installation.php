<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installation extends Model
{
    use HasFactory;

    protected $fillable = [
    	'village_name',
        'district',
        'state',
        'pincode',
        'installtion_address',
        'year',
        'model_type',
        'installtion_machine_number',
        'installtion_phone',
        'installtion_date',
        'installtion_image',
        'responsible_service_person',
        'warranty',
        'invoice_value',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id' , 'id');
    }
}
