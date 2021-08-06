<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\Basecontroller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Basecontroller
{
    //
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|alpha',
            'username' => 'required|unique:users,username',
            'no_telp' => 'required|min:12|unique:users,no_telp|max:13',
            'password' => 'required|min:8',
            'c_password' => 'required|same:password',
            // 'level' => 'required',

        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        // $input = $request->all();
        $input = [
            'name' => $request->name, 
            'username' => $request->username, 
            'no_telp' => $request->no_telp,
            'lokasi_id'=>$request->lokasi,
            'level' => 'nelayan'
        ];
       
        $input['password'] = Hash::make($request->password);
        $user = User::create($input);
        $success['user'] = User::with('lokasi')->where('id',$user->id)->first() ;

        return $this->sendResponse($success, 'User register successfully.');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (Auth::user()->level == 'nelayan') {
                $user = Auth::user();
                $success['token'] =  $user->createToken('MyApp')->plainTextToken;
                $success['user'] = User::with('lokasi')->where('id',$user->id)->first();

                return $this->sendResponse($success, 'login success.');
            } else {
                return $this->sendError('gagal.', ['error' => 'Maaf beda level']);
            }
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Login gagal silahkan periksa kembali']);
        }
    }
    public function login_tpi(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (in_array(Auth::user()->level,['admin_tpi','admin_koperasi'])) {
                $user = Auth::user();
                $success['token'] =  $user->createToken('MyApp')->plainTextToken;
                $success['user'] = User::with('lokasi')->where('id',$user->id)->first();

                return $this->sendResponse($success, 'login success.');
            } else {
                return $this->sendError('gagal.', ['error' => 'Maaf beda level']);
            }
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Login gagal silahkan periksa kembali']);
        }
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        return $this->sendResponse('', 'anda sudah logout');
    }
}
