<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $table ="articles";
    public $timestamps = false;

    protected $fillable=[
    	'tag',
    	'heading',
    	'description',];
}
