<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'email', 'logo', 'website'
    ];

    public function emploee(){
        return $this->hasMany('App\Employee');
    }
}
