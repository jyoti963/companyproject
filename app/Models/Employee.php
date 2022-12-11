<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    public function companies()
    {
        return $this->belongsTo('App\Models\Company' , 'company_id')->select('id','name');
    }
}
