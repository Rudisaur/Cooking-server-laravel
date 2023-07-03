<?php
namespace App\Http\Services;
use App\Enums\TokenType;
use App\Models\User;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

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

        return $user->createToken('auth_token')->plainTextToken;
    }

    public function loginUser(array $request): ?string
    {
        if (Auth::attempt($request)) {
            $user = Auth::user();
            return $user->createToken('auth_token')->plainTextToken;
        }
        return null;
    }
}
