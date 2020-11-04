<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	/**
	 * Attr that can be mass assigned
	 * 
	 * @var []
	 */
    protected $fillable = [
    	'user_id'
    ];
}
