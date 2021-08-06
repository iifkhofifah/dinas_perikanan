<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
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
                'name' => 'admin',
                'username' => 'iif',
                'no_telp' => '081234123234',
                'password' => Hash::make('iif123'),
                'level' => 'admin_tpi',
            ],
            [
                'name' => 'khofifah',
                'username' => 'khofi',
                'no_telp' => '081234123234',
                'password' => Hash::make('khofi123'),
                'level' => 'nelayan',
            ],
            [
                'name' => 'dwi',
                'username' => 'dwi',
                'no_telp' => '081234123234',
                'password' => Hash::make('dwi'),
                'level' => 'admin_koperasi',
            ]
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
