<?php

namespace Database\Seeders;

use App\Models\Anggota;
use App\Models\SambutanKetua;
use Illuminate\Database\Seeder;

class CreateSambutanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anggota = Anggota::where('jabatan', 'LIKE', '%Ketua Umum%')->first();
        $sambutan = [
            [
                'body' => 'Bismillahirrahmanirrahim. Assalamu’alaikum warahmatullahi wabarakatuh, Selamat siang, Salam sejahtera bagi kita semuanya, Om Swastiastu, Namo Buddhaya, Salam kebajikan.

                Selamat datang di situs website Taekwondo Sulawesi Selatan. Website ini kami sajikan untuk membantu penyebarluasan informasi seputar Taekwondoin Sulsel dan membantu berbagai layanan bagi anggota Taekwondo SulSel. Semoga website ini dapat bermanfaat bagi kita semua khususnya bagi pencinta cabang olahraga Taekwondo SulSel. Kami menyadari bahwa pada pengembangan website ini masih terdapat banyak kekurangan sehingga segala saran dan masukan akan terus kami tampung demi kesempurnaan website ini. Terimakasih',
                'anggota_id' => $anggota->id
            ],
        ];

        foreach ($sambutan as $key => $value) {
            SambutanKetua::create($value);
        }
    }
}
