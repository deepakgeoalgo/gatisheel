<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateIssue extends Model
{
    use HasFactory;

    protected $fillable = [
    	'issue_date',
    	'issue_description',
    	'current_status',
    	'ownership',    	
    ];
}
