<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pengguna;
use Illuminate\Support\Facades\Auth;
use Validator;

class PenggunaController extends Controller
{    
    public $successStatus = 200;

    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $pengguna = Auth::user();
            $success['token'] =  $pengguna->createToken('nApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $pengguna = pengguna::create($input);
        $success['token'] =  $pengguna->createToken('nApp')->accessToken;
        $success['nama'] =  $pengguna->nama;

        return response()->json(['success'=>$success], $this->successStatus);
    }

    public function logout(Request $request)
    {
        $logout = $request->pengguna()->token()->revoke();
        if($logout){
            return response()->json([
                'message' => 'Successfully logged out'
            ]);
        }
    }

    public function details()
    {
        $pengguna = Auth::user();
        return response()->json(['success' => $pengguna], $this->successStatus);
    }
}
