<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Tpsampah extends Eloquent {
	
	public $timestamps = false;

    protected $table = 'ppl_waste_tpsampahs';
	
	/**
	 * Fillable fields for a Tpsampah.
	 * 
	 * @var array
	 */
	protected $fillable = [
		'name', 'location'
	];
	
	public function entries()
    {
        return $this->hasMany('App\EntriTpsampah', 'tps_id');
    }

    public function entrytpas() {
        return $this->hasMany('App\EntriTpakhir', 'tps_id');
    }
}
