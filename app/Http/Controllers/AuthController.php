<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthController extends Controller
{
    //
    public function register(AuthRequest $request)
    {

        dd($request->validated());
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
