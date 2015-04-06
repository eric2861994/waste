<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Tpsampah extends Eloquent {
	
	public $timestamps = false;
	
	/**
	 * Fillable fields for a Tpsampah.
	 * 
	 * @var array
	 */
	protected $fillable = [
		'name', 'location'
	];
}
