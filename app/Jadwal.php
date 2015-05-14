<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model {

	//
    protected $table = 'ppl_waste_jadwals';
	public $timestamps = false;
	protected $fillable = ['summary'];

	public function details() {
        return $this->hasMany('App\DetailJadwal', 'jadwal_id');
    }

}
