<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Ktp;
class KtpTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('ppl_dukcapil_ktp')->delete();
        Model::unguard();
        Ktp::create([
            'nik' => 'budi',
            'password' => 'budi',
            'nama' => 'budi',
            'username' => 'budi',
            'email' => 'budi@budi.com',
            'kota_lahir' => 'Bandung',
            'tanggal_lahir' => '1995-07-07',
            'jenis_kelamin' => 'laki-laki',
            'gol_darah' => 'AB',
            'alamat' => 'Jalan Ganesha 10',
            'rt' => 10,
            'rw' => 20,
            'kel_desa' => '-',
            'kec' => 'Bandung Kota',
            'kota_kab' => 'Bandung',
            'kode_pos' => 40141,
            'agama' => 'Islam',
            'status' => 'Belum menikah'
        ]);
        Ktp::create([
            'nik' => 'andi',
            'password' => 'andi',
            'nama' => 'andi',
            'username' => 'andi',
            'email' => 'andi@andi.com',
            'kota_lahir' => 'Jakarta',
            'tanggal_lahir' => '1994-07-07',
            'jenis_kelamin' => 'laki-laki',
            'gol_darah' => 'A',
            'alamat' => 'Jalan Gelap Nyawang 10',
            'rt' => 13,
            'rw' => 12,
            'kel_desa' => '-',
            'kec' => 'Bandung Pusat',
            'kota_kab' => 'Bandung',
            'kode_pos' => 40141,
            'agama' => 'Islam',
            'status' => 'Sudah menikah'
        ]);
        Ktp::create([
            'nik' => 'admin',
            'password' => 'admin',
            'nama' => 'admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'kota_lahir' => 'Bandung',
            'tanggal_lahir' => '1995-07-07',
            'jenis_kelamin' => 'laki-laki',
            'gol_darah' => 'O',
            'alamat' => 'Jalan Asia Afrika',
            'rt' => 65,
            'rw' => 13,
            'kel_desa' => '-',
            'kec' => 'Cibadak',
            'kota_kab' => 'Bandung',
            'kode_pos' => 40141,
            'agama' => 'Islam',
            'status' => 'Belum menikah',
            'role' => 'admin'
        ]);
    }
}