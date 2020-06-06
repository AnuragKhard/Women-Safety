<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class regphone extends Model
{
    protected $table ="regphones";
    public $timestamps = false;

    protected $fillable=[
    	'email',
    	'registerphone',];
}
