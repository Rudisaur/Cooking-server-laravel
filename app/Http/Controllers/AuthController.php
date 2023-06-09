<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthController extends Controller
{
    //
    public function register(Request $request){
     $request->validate([
         'name' => ['required', 'string', 'max:255'],
         'email' => ['required', 'email', 'unique:users'],
         'password' => ['required', 'min:8'],
     ]);
     $user = User::create([
         'name'=> $request->name,
         'email'=> $request->email,
         'password' => Hash::make($request->password),
     ]);
     $key = 'secret_key';
     $payload = [
         'id' => $user->id,
         'iat'=> Carbon::now()->timestamp + 20
     ];
     $jwt = JWT::encode($payload, $key,'HS256');
     dd($jwt);
    }
}
