<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practise extends Model
{
	/**
	 * Attr that can be mass assigned
	 * 
	 * @var []
	 */
    protected $fillable = [
    	'user_id', 'title', 'start_date', 'end_date', 'number_of_days', 'court'
    ];

    /**
     * A practise belongs to a user
     * 
     * @return 
     */
    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
