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

    protected $table = 'ppl_waste_entri_tpakhirs';

    public function tps() {
        return $this->belongsTo('App\Tpsampah', 'tps_id');
    }

    public function tpa() {
        return $this->belongsTo('App\Tpakhir', 'tpa_id');
    }
}
