<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'first_name', 'last_name', 'company_id', 'email', 'phone'
    ];

    public function company(){
        return $this->belongsTo('App\Company', 'company_id');
    }
}
