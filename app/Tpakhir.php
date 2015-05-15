<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Tpakhir extends Eloquent {
	
	public $timestamps = false;

    protected $table = 'ppl_waste_tpakhirs';
	
	/**
	 * Fillable fields for a Tpakhir.
	 * 
	 * @var array
	 */
	protected $fillable = [
		'name', 'location'
	];

    public function entry() {
        return $this->hasMany('App\EntriTpakhir', 'tpa_id');
    }
}
