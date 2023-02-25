<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin12345'),
            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'password' => bcrypt('user12345'),
            ],
            [
                'name' => 'Provinsi',
                'email' => 'provinsi@provinsi.com',
                'password' => bcrypt('provinsi12345'),
            ],
            [
                'name' => 'Kabupaten',
                'email' => 'kab@kab.com',
                'password' => bcrypt('kab12345'),
            ],
            [
                'name' => 'ranting',
                'email' => 'ranting@ranting.com',
                'password' => bcrypt('ranting12345'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
