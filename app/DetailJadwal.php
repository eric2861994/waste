<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailJadwal extends Model {

		public $timestamps = false;
		protected $fillable = ['jadwal_id', 'start_time', 'end_time', 'description'];
	//

}
