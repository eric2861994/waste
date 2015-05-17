<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Tpakhir extends Eloquent {
	
	public $timestamps = false;

    protected $table = 'ppl_waste_tpakhirs';
	protected $fillable = ['name', 'location'];

    public function entry() {
        // TODO determine if this is useful, currently not useful: 16 May 2015 jam 22:43
        return $this->hasMany('App\EntriTpakhir', 'tpa_id');
    }
}
