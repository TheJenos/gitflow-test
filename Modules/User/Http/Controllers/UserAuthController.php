<?php

namespace Modules\User\Http\Controllers;

use Hash;
use Auth;
use Illuminate\Routing\Controller;
use Modules\User\Entities\User;
use Modules\User\Http\Requests\UserLoginRequest;

class UserAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api-user'])->except(['login']);
    }

    public function login(UserLoginRequest $request)
    {
        $user = User::where('email', $request['email'])->first();

        if ($user && Hash::check($request['password'],$user['password'])) {
            $token = $user->createToken('api-user')->accessToken;
            return response()->json(['user'=>$user , 'token'=> $token],200);
        }

        return response()->json(['error'=>'auth fail'],422);



    }

    public function currentUser(){
        $user = User::find(Auth::id());
        return response()->json($user,200);
    }
}
