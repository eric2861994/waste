<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DetailJadwal extends Model
{

    public $timestamps = false;
    protected $fillable = ['jadwal_id', 'start_time', 'end_time', 'description'];

    public function getStartTimeAttribute($value) {
        return Carbon::createFromFormat('H:i:s', $value);
    }
}
