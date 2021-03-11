<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\{Arr, Str};
use Illuminate\Support\Facades\Auth;

class AuthMutator
{
    public function login($root, array $args)
    {
        $credentials = Arr::only($args, ['email','password']);

        if (Auth::once($credentials)) {
            $user =  auth()->user();
            if($user->api_token == null){
                $user->api_token = $user->createToken('user-token')->plainTextToken;
                $user->update();
                return $user->api_token;
            }
            return $user->api_token;
        }

        // if (Auth::once($credentials)) {
        //     $user =  auth()->user();

        //     $user->token = $user->createToken('user-token')->plainTextToken;

        //     return $user;
        // }
        return null;
    }

    public function logout()
    {
    }
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
    }
}
