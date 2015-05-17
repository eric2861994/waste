<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserJadwal extends Model {

    public $timestamps = false;

    protected $table = 'ppl_waste_user_jadwals';

    protected $fillable = ['id_user', 'id_jadwal'];

    public function jadwal() {
        return $this->belongsTo('App\Jadwal', 'id_jadwal');
    }
}
