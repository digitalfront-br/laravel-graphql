<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash, Validator};

class AuthController extends Controller
{
    public function logout()
    {
        return Auth::logout();
    }
    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email'  =>  'required|email',
            'password'  =>  'required|min:6'
        ], [
            'email.required' => 'O email é obrigatório',
            'email.email' => 'O email precisa ser válido',
            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A senha tem pelo menos 6 caracteres',
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 400);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['email' => ['Email não cadastrado']], 400);
        } else {
            if (Hash::check($request->password, $user->password)) {
            } else {
                return response()->json(['password' => ['Senha incorreta']], 400);
            }
        }
        if($user->api_token == null) {
            $user->api_token = $user->createToken('user-token')->plainTextToken;
            $user->update();
        }
        return response()->json($user, 200);
    }

    public function createAccount(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name'      =>  'required|min:3',
            'email'     =>  'required|email',
            'phone'     =>  'required|min:11',
            'password'  =>  'required|min:6'
        ], [
            'name.required' => 'O nome é obrigatório',
            'name.min'      => 'O nome precisa de pelo menos 3 caracteres',
            'email.required' => 'O email é obrigatório',
            'email.email'   => 'O email precisa ser válido',
            'phone.required' => 'O telefone é obrigatório',
            'phone.min'     => 'O telefone precisa de pelo menos 11 caracteres',
            'password.min'  => 'A senha tem pelo menos 6 caracteres',
            'password.required' => 'A senha é obrigatória',
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 400);
        }

        $findUser = User::where('email', $request->email)->first();

        if ($findUser) {
            return response()->json(['email' => ['Email já esta cadastrado']], 400);
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'roles' => 0
            ])->id;

            $u =  User::find($user);
            $u->api_token = $u->createToken('user-token')->plainTextToken;
            $u->update();

            return response()->json($user, 201);
        }
    }

    public function forgotPassword(Request $request)
    {
        $setUser = User::where('email', $request->email)->first();
        if($setUser) {
            return response()->json(['email' => 'Email Cadastrado'], 200);
        } else {
            return response()->json(['email' => 'Email não cadastrado'], 400);
        }
    }
}
