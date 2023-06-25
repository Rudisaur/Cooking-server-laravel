<?php
namespace App\Http\Services;
use App\Enums\TokenType;
use App\Models\User;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthService
{
//    const REFRESH_LIFETIME = 20000;
//    const ACCESS_LIFETIME = 30;


    public function createUser(array $request): string
    {
        $user = User::query()->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return $token;
    }
    public function loginUser(array $request)
    {
        if (Auth::attempt($request)) {
            $user = Auth::user();
            $token = $user->createToken('sanctum-token')->plainTextToken;

            return $token;
        } else {
            return null;
        }
    }

//    public function createJWT(int $userId, TokenType $tokenType): string
//    {
//        $payload = [
//            'iat' => Carbon::now()->timestamp + ($tokenType->value === 'refresh') ? self::REFRESH_LIFETIME: self::ACCESS_LIFETIME,
//            'id'=>$userId,
//        ];
//        return JWT::encode($payload, env('JWT_SECRET'), 'HS256');
//    }
//    public function setRefreshToken($userId, $refreshToken)
//    {
//        $user = User::query()->find($userId);
//        $user->query()->update([
//            'remember_token'=>$refreshToken
//        ]);
//    }
//    public function loginUser(array $request){
//        if(Auth::attempt($request)){
//            //$user = DB::table('users')->where('email','=',$request['email'])->first();
//            return User::query()->where('email' , $request['email'])->first()->id;
//        }
//        return back()->withErrors([
//            'email' => 'Invalid credentials',
//        ]);
//
//    }
}
