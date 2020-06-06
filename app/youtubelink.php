<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class youtubelink extends Model
{
    protected $table ="youtubelinks";
    public $timestamps = false;

    protected $fillable=[
    	'thumbnail',
    	'link',];
}
