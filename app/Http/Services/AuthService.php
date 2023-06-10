<?php
namespace App\Http\Services;
use App\Models\User;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function createUser($request)
    {
        $user = User::create([
            'name' => $request->validated('name'),
            'email' => $request->validated('email'),
            'password' => Hash::make($request->validated('password')),
        ]);
        $key = 'secret_key';
        $payload = [
            'id' => $user->id,
            'iat' => Carbon::now()->timestamp + 20
        ];
        $jwt = JWT::encode($payload, $key, 'HS256');
        dd($jwt);
    }
}
