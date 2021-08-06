<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use Illuminate\Database\Seeder;


class lokasiSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { $lokasi = [
        [
            'nama_lokasi' => 'KUD mina sumitra'
        ],
        [
            'nama_lokasi' => 'KUD dadap'
        ],
        [
            'nama_lokasi' => 'KUD eretan'
        ]
    ];
    foreach ($lokasi as $key => $value) {
        Lokasi::create($value);
    }
}
    }

