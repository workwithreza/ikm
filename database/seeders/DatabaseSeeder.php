<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Pegawai::create([
            'NIP' => 12345,
            'nama_pegawai' => 'Muhammad Reza Azzahrawan',
            'username_pegawai' => 'murera',
            'password_pegawai' => md5('12345'),
            'is_admin' => 1
        ]);

        Pegawai::create([
            'NIP' => 123456,
            'nama_pegawai' => 'Zaki Tifani Fauzan',
            'username_pegawai' => 'zakifauzz',
            'password_pegawai' => md5('12345'),
            'is_admin' => 0
        ]);
    }
}
