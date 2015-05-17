<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Tpakhir extends Eloquent {
	
	public $timestamps = false;

    protected $table = 'ppl_waste_tpakhirs';
	protected $fillable = ['name', 'location'];

    public function entry() {
        return $this->hasMany('App\EntriTpakhir', 'tpa_id');
    }

    public function volume() {
        $total = 0;
        foreach ($this->entry as $entry)
            $total += $entry->volume;
        return $total;
    }
}
