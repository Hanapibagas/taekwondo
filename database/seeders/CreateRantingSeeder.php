<?php

namespace Database\Seeders;

use App\Models\Ranting;
use App\Models\Regency;
use Illuminate\Database\Seeder;

class CreateRantingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regencies = Regency::where('name', 'LIKE', '%MAROS%')->first();
        $ranting = [
            [
                'nama' => 'Taekwondo Maros',
                'alamat' => 'disana',
                'regencies_id' => $regencies->id
            ],
            [
                'nama' => 'Taekwondo Barru',
                'alamat' => 'disana',
                'regencies_id' => $regencies->id
            ],
        ];

        foreach ($ranting as $key => $value) {
            Ranting::create($value);
        }
    }
}
