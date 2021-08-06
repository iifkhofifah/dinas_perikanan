<?php

namespace Database\Seeders;

use App\Models\JenisAlat;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // 
        // $this->call([
        //     AkunSeeder::class,
        //     lokasiSeed::class,
        //     AlatSeed::class,
        // ]);

        User::create([
            'name' => 'admin dadap',
            'username' => 'dadap',
            'no_telp' => '081943127801',
            'password' => Hash::make('12345678'),
            'level' => 'admin_tpi',
            'lokasi_id'=>2

        ]);
    }
}
