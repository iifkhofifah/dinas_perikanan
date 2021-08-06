<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Models\HasilIkan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HasilIkanController extends BaseController
{
    public function postIkan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required',
            'jenis_ikan' => 'required',
            'jenis_alat' => 'required',
            'harga' => 'required',
            'berat' => 'required',

        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = [
            'lokasi_id' => $request->user()->lokasi_id,
            'tgl' => $request->tanggal,
            'jenis_ikan' => $request->jenis_ikan,
            'alat_tangkap' => $request->jenis_alat,
            'volume_kg' => $request->berat,
            'harga_kg' => $request->harga,
            'total_harga' => $request->harga * $request->berat,
        ];
        $hasil = HasilIkan::create($input);
        $data = HasilIkan::with('dataikan', 'jenisalat')->find($hasil->id_hasil);
        return $this->sendResponse($data, 'Berhasil ditambahkan');
    }

    public function getAllhasilIkan()
    {
        $data = HasilIkan::with('dataikan', 'jenisalat')->get();
        return $this->sendResponse($data, 'Berhasil ditambahkan');
    }
}
