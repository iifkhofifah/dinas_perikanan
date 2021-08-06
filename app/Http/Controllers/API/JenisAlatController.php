<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Models\DataIkan;
use App\Models\JenisAlat;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class JenisAlatController extends BaseController
{

    public function getJenisAlat(Request $request)
    {
        // $data = DataIkan::with('lokasi')->get();
        $data = JenisAlat::with('lokasi')->where('lokasi_id', $request->user()->lokasi_id)->get();
        return $this->sendResponse($data, 'Data Alat success');
    }
    // public function postAlat(Request $request)
    // {
    //     $input = [
    //         'nama_alat' => $request->nama_alat,
    //         'lokasi_id' => $request->user()->lokasi_id,
    //     ];
    //     $data = JenisAlat::create($input);
    //     return $this->sendResponse($data, 'Data Berhasil Ditambahkan');
    //     // return response()->json($data, JSON_UNESCAPED_UNICODE);
    // }
}
