<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeSarana extends Model {

	public $timestamps = false;

    protected $table = 'ppl_waste_tipe_saranas';
    protected $fillable = ['type', 'volume', 'count'];

    public function saranas() {
        return $this->hasMany('App\Sarana', 'type_id');
    }

    public function jumlah() {
        return count($this->saranas);
    }
}
