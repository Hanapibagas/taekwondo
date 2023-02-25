<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class CreateRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
            ],
            [
                'name' => 'provinsi',
            ],
            [
                'name' => 'kabupaten',
            ],
            [
                'name' => 'ranting',
            ],
        ];

        foreach ($roles as $key => $value) {
            Role::create($value);
        }
    }
}
