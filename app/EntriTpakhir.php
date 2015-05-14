<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class EntriTpakhir extends Eloquent {
	
	/**
	 * Fillable fields for a EntriTpakhir.
	 * 
	 * @var array
	 */
	protected $fillable = [
		'tps_id', 'tpa_id', 'volume'
	];

    protected $table = 'ppl_waste_tpakhirs';
}
