<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

    protected $fillable = ['role'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ppl_dukcapil_ktp';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    public function peran() {
        if ($this->role == 'waste_pemantau')
            return 'Pemantau Sampah';
        else if ($this->role == 'waste_penyapu')
            return 'Penyapu Jalan';
        else if ($this->role == 'waste_pengangkut')
            return 'Pengangkut Sampah';
        else if ($this->role == 'waste_tps')
            return 'Petugas TPS';
        else
            return $this->role;
    }

    public function level() {
        if ($this->role == 'waste_penyapu')
            return 1;
        elseif ($this->role == 'waste_pengangkut')
            return 1;
        elseif ($this->role == 'waste_tps')
            return 2;
        elseif ($this->role == 'waste_pemantau')
            return 3;
        else
            return 0;
    }

    public function penghubung() {
        return $this->hasOne('App\UserJadwal', 'id_user');
    }
}
