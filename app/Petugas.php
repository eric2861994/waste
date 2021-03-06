<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Petugas extends Eloquent {
	
	public $timestamps = false;

    protected $table = 'ppl_waste_petugas';
	
	/**
	 * Fillable fields for a Petugas.
	 * 
	 * @var array
	 */
	protected $fillable = [
		'nip'
	];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
