<?php

namespace Database\Seeders;

use App\Models\Anggota;
use Illuminate\Database\Seeder;

class CreateAnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anggota = [
            [
                'nama' => 'Kalfin',
                'jabatan' => 'Ketua Umum',
                'alamat' => '',
                'jenis_kelamin' => 'Laki-laki',
                'telp' => '08756886688',
                'photo' => 'user.jpg',
            ],
        ];

        foreach ($anggota as $key => $value) {
            Anggota::create($value);
        }
    }
}
