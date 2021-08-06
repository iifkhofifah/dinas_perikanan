<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Models\DataIkan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\VarDumper\Cloner\Data;

class JenisIkanController extends BaseController
{
    public function getJenisikan(Request $request)
    {
        if ($request->has('filter')) {
            # code...a
            $data = DataIkan::where('lokasi_id', $request->filter)->get();
            return $this->sendResponse($data, 'data ok');
        }
        return $this->sendResponse(DataIkan::with('lokasi')->all(), 'Data Ikan success');
    }
    public function tambahIkan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_ikan' => 'required|unique:dataikans,nama_ikan,NULL,id,lokasi_id,' . $request->user()->lokasi_id,
            'harga_ikan' => 'required',


        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $input = [
            'nama_ikan' => $request->nama_ikan,
            'harga_ikan' => $request->harga_ikan,
            'lokasi_id' => $request->user()->lokasi_id,
        ];
        $data = DataIkan::create($input);
        return $this->sendResponse($data, 'Data Berhasil Ditambahkan');
        // return response()->json($data, JSON_UNESCAPED_UNICODE);
    }
    public function editIkan(Request $request, DataIkan $dataIkan)
    {
        $validator = Validator::make($request->all(), [
            'nama_ikan' => [Rule::unique('dataikans')->ignore($dataIkan->id_ikan, 'id_ikan'), 'required'],
            'harga_ikan' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $input = [
            'nama_ikan' => $request->nama_ikan,
            'harga_ikan' => $request->harga_ikan,
            'lokasi_id' => $request->user()->lokasi_id,

        ];
        // $data = DataIkan::firstWhere('id_ikan', $dataIkan->id_ikan)->update($input)->first();
        // return $this->sendResponse($data, 'Data Berhasil Diedit');
        // return response()->json($data, JSON_UNESCAPED_UNICODE);
        $user = tap(DataIkan::where('id_ikan', $dataIkan->id_ikan))->update($input)->first();
        if ($user) {
            return $this->sendResponse($user, 'Data Berubah');
        }
        return $this->sendResponse('', ['error' => 'gagal'], 400);
    }
    public function hapusIkan(DataIkan $dataIkan)
    {
        $data = DataIkan::destroy('id_ikan', $dataIkan->id_ikan);
        return $this->sendResponse($data, 'Data berhasil dihapus');
        // return response()->json($data, JSON_UNESCAPED_UNICODE);
    }

    public function getIkanByTpi(Request $request)
    {

        $data = DataIkan::with('lokasi')->where('lokasi_id', $request->user()->lokasi_id)->get();
        return $this->sendResponse($data, 'Data berhasil diambil');
        // return response()->json([
        //     'status' => true,
        //     'message' => 'get data  berhasil',
        //     'data'  => $data
        // ]);
    }
}
