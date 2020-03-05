<?php

namespace Rentit\Models;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table='properties';

    protected $fillable=['title','price','description', 'user_id'];

    public function user(){
        return $this->belongsTo('Rentit\Models\User');
    }
}