<?php

namespace Database\Seeders;

use App\Models\JenisAlat;
use Illuminate\Database\Seeder;

class AlatSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alat = [
            [
                'nama_alat' => 'Jaring Nylon','lokasi_id'=> 1
            ],
            [
                'nama_alat' => 'Pancing','lokasi_id'=> 1
            ],
            [
                'nama_alat' => 'Jaring Payang','lokasi_id'=> 1
            ],
            [
                'nama_alat' => 'Jaring Sontong','lokasi_id'=> 1
            ],
            [
                'nama_alat' => 'Pursesine Mini','lokasi_id'=> 1
            ],
            [
                'nama_alat' => 'Jaring Milinium','lokasi_id'=> 1
            ],
            [
                'nama_alat' => 'Jaring Rampus','lokasi_id'=> 1
            ],
            [
                'nama_alat' => 'Jaring Udang','lokasi_id'=> 1
            ],
        ];
        foreach ($alat as $key => $value) {
           JenisAlat::create($value);
        }
    }
}
