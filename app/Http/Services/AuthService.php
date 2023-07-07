<?php
namespace App\Http\Services;
use App\Enums\TokenType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function createUser(array $request): string
    {
        /** @var User $user */
        $user = User::query()->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => 'cook',
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        setcookie('auth_token', $token);
        return $token;
    }

    public function loginUser(array $request): ?string
    {
        if (Auth::attempt($request)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;
            setcookie('auth_token', $token);
            return $token;
        }
        return null;
    }
}
