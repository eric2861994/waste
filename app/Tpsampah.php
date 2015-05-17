<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Tpsampah extends Eloquent {
	
	public $timestamps = false;

    protected $table = 'ppl_waste_tpsampahs';
	protected $fillable = ['name', 'location'];
	
	public function entries()
    {
        return $this->hasMany('App\EntriTpsampah', 'tps_id');
    }

    public function entrytpas() {
        return $this->hasMany('App\EntriTpakhir', 'tps_id');
    }

    public function volume() {
        $total = 0;
        foreach ($this->entries as $entry)
            $total += $entry->volume;
        foreach ($this->entrytpas as $entry)
            $total -= $entry->volume;
        return $total;
    }
}
