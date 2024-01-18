<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Auth;

class AuthController extends Controller {
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:15', 'alpha_dash', 'unique:users,username'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];

            return response()->json($response, 400);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['role_id'] = 3;
        $user = User::create($input);

        event(new Registered($user));

        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

        $response = [
            'success' => true,
            'data' => $success,
            'message' => 'Useri u shtua me sukses.'
        ];

        return response()->json($response, 200);
    }

    public function login(Request $request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user instanceof MustVerifyEmail && !$user->hasVerifiedEmail()) {
                $response = [
                    'success' => false,
                    'message' => 'Please, verify your email address.'
                ];
                return response()->json($response);
            }

            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;

            $response = [
                'success' => true,
                'data' => $success,
                'message' => 'User u logua me sukses'
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'success' => false,
                'message' => 'Unauthorised'
            ];
            return response()->json($response);
        }
    }
}
