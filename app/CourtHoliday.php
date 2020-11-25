<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourtHoliday extends Model
{
	const CURRENT_YEAR = '2020';
	
	/**
	 * Attr that can be mass assigned
	 * 
	 * @var []
	 */
    protected $fillable = [
    	'year', 'state', 'start_date', 'end_date', ''
    ];
}
