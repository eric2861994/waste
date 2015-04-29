<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;

class KTP extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ppl_dukcapil_ktp';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['password', 'nama', 'kota_lahir', 'tanggal_lahir', 'jenis_kelamin', 'gol_darah',
        'alamat', 'rt', 'rw', 'kel_desa', 'kec', 'kota_kab', 'kode_pos', 'agama', 'status',
        'kewarganegaraan', 'tgl_kadaluarsa', 'kota_dikeluarkan', 'prov_dikeluarkan', 'tgl_dikeluarkan'
    ];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    protected $appends = ['is_admin'];

    //mutator password
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }

    public function getIsAdminAttribute()
    {
        return $this->role == 'admin';
    }
}
