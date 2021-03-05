<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateIssue extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'installation_id',
    	'issue_date',
    	'issue_description',
    	'current_status',
    	'ownership',    	
    ];

    public function currentStatus()
    {
        return $this->belongsTo('App\Models\Status', 'current_status' , 'id');
    }

    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'ownership' , 'id');
    }

    public function assignTo()
    {
        return $this->belongsTo('App\Models\User', 'assign_to' , 'id');
    }

    public function CustomerDetails()
    {
        return $this->belongsTo('App\Models\Installation', 'installation_id' , 'id');
    }
}
