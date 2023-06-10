<?php
namespace App\Http\Services;
use App\Models\User;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function createUser(array $request): array
    {
        $user = User::query()->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return [
            'id' => $user->id,
            'iat' => Carbon::now()->timestamp + 20
        ];
    }

    public function getJWT(array $payload): string
    {
        return JWT::encode($payload, env('JWT_SECRET'), 'HS256');
    }
}