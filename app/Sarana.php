<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sarana extends Model {

	public $timestamps = false;

    protected $fillable = ['type_id', 'schedule_id'];

    public function tipe() {
        return $this->belongsTo('App\TipeSarana');
    }
}
