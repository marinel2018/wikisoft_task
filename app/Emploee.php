<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Emploee extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'first_name', 'last_name', 'company', 'email', 'phone'
    ];

    public function company(){
        return $this->belongsTo('App\Company', 'company');
    }
}
