<?php

require '../../vendor/autoload.php';
require '../../config.php';
new \Rentit\Models\DB();
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('users',function($table){
    $table->increments('id');
    $table->string('email')->unique();
    $table->string('passw');
    $table->string('phone');
    $table->string('roles')->nullable();
    $table->timestamps();
});


Capsule::schema()->create('properties',function($table){
    $table->increments('id');
    $table->string('title');
    $table->string('price');
    $table->string('description');
    $table->integer('user_id')->unsigned();
    $table->timestamps();
    $table->foreign('user_id')->references('id')->on('users');
});