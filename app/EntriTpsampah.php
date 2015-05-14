<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class EntriTpsampah extends Eloquent {
	
	/**
	 * Fillable fields for a EntriTpsampah.
	 * 
	 * @var array
	 */
	protected $fillable = [
		'tps_id', 'volume'
	];

    protected $table = 'ppl_waste_entri_tpsampahs';
}
