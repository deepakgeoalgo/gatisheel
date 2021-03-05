<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignIssue extends Model
{
    use HasFactory;

    protected $fillable = [
    	'issue',
    	'assigned_to',
    	'comment',  	
    ];

    public function createIssue()
    {
        return $this->belongsTo('App\Models\CreateIssue', 'issue_id' , 'id');
    }
}
