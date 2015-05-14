<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sarana extends Model {

	public $timestamps = false;

    protected $table = 'ppl_waste_saranas';

    protected $fillable = ['type_id', 'schedule_id', 'plate_number'];

    public function tipeSarana() {
        return $this->belongsTo('App\TipeSarana', 'type_id');
    }

    public function jadwal() {
        return $this->belongsTo('App\Jadwal', 'schedule_id');
    }
}
