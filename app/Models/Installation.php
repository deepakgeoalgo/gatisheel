<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Installation extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    public function issue()
    {
        return $this->hasOne('App\Models\CreateIssue', 'installation_id' , 'id');
    }
}
