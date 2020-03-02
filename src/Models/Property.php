<?php

namespace Rentit\Models;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table='properties';

    protected $fillable=['title','price','description'];

    public function user(){
        return $this->belongsTo('Rentit\Models\User');
    }
}