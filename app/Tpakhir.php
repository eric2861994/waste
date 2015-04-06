<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Tpakhir extends Eloquent {
	
	/**
	 * Fillable fields for a song.
	 * 
	 * @var array
	 */
	protected $fillable = [
		'name', 'location'
	];
}
