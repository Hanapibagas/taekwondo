<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use Illuminate\Database\Seeder;

class CreateKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kegiatan = [
            [
                'judul' => 'Ketua Umum PBTI, Ucapkan Selamat Atas Suksesnya Papua Sebagai Tuan Rumah PON XX',
                'deskripsi' => '',
                'gambar' => 'kegiatan.jpg',
            ],
            [
                'judul' => 'Taekwondo Selamatkan Kontingen Indonesia di Ajang World Military Games',
                'deskripsi' => '',
                'gambar' => 'kegiatan.jpg',
            ],
            [
                'judul' => 'Persiapan Sea Games Vietnam 2022, PBTI Kembali Gelar Seleknas Poomsae',
                'deskripsi' => 'admin',
                'gambar' => 'kegiatan.jpg',
            ],

        ];

        foreach ($kegiatan as $key => $value) {
            Kegiatan::create($value);
        }
    }
}
