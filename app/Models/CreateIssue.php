<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateIssue extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
    	'issue_date',
    	'issue_description',
    	'current_status',
    	'ownership',    	
    ];
}
