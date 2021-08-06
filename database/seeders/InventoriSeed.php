<?php

namespace Database\Seeders;

use App\Models\Inventori;
use Illuminate\Database\Seeder;

class InventoriSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inv = [
            ['id_alat'=>1,'lokasi_id'=>1],
            ['id_alat'=>2,'lokasi_id'=>1],
            ['id_alat'=>3,'lokasi_id'=>1],
            ['id_alat'=>4,'lokasi_id'=>1],
            ['id_alat'=>5,'lokasi_id'=>1],
            ['id_alat'=>6,'lokasi_id'=>1],
            ['id_alat'=>7,'lokasi_id'=>1],
            ['id_alat'=>8,'lokasi_id'=>1],
        ];

        foreach ($inv as $key => $value) {
            Inventori::create($value);
        }
    }
}
