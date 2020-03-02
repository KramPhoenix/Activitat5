<?php

namespace Rentit\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='users';
    protected $fillable=['email','passw','phone'];
    //default values
    protected $attributes=[
        'roles'=>'client'
    ];
    public  function properties(){
        return $this->hasMany('Rentit\Models\Property');
    }
}