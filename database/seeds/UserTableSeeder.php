<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::create(['nik' => 'andi', 'role' => 'A', 'password' => Hash::make('admin')]);
    }

}

?>
