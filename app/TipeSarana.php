<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeSarana extends Model {

	public $timestamps = false;

    protected $table = 'ppl_waste_tipe_saranas';

    protected $fillable = ['type', 'volume'];

    public function saranas() {
        return $this->hasMany('App\Sarana', 'type_id');
    }

}
