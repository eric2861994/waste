<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeSarana extends Model {

	public $timestamps = false;

    protected $fillable = ['type', 'count'];

    public function saranas() {
        return $this->hasMany('App\Sarana');
    }

}
