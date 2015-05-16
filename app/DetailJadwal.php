<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DetailJadwal extends Model
{

    protected $table = 'ppl_waste_detail_jadwals';

    public $timestamps = false;
    protected $fillable = ['jadwal_id', 'start_time', 'end_time', 'description'];

    public function getStartTimeAttribute($value) {
        return Carbon::createFromFormat('His', $value);
    }

    public function getEndTimeAttribute($value) {
        return Carbon::createFromFormat('His', $value);
    }

    public function jadwal() {
        return $this->belongsTo('App\Jadwal', 'jadwal_id');
    }
}
