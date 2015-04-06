<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class EntriSampah extends Eloquent {
	
	/**
	 * Fillable fields for a song.
	 * 
	 * @var array
	 */
	protected $fillable = [
		'tps_id', 'volume'
	];
}
