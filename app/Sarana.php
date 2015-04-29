<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sarana extends Model {

	public $timestamps = false;

    protected $fillable = ['type_id', 'schedule_id', 'plate_number'];

    public function tipeSarana() {
        return $this->belongsTo('App\TipeSarana', 'type_id');
    }
}
