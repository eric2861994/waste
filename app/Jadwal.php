<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model {

	//
	public $timestamps = false;
	protected $fillable = ['summary'];

	public function details() {
        return $this->hasMany('App\DetailJadwal', 'jadwal_id');
    }

}
