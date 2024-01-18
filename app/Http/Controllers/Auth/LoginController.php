<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{

    use AuthenticatesUsers;

    public function attemptLogin(Request $request)
    {
        //attempt to issue a token to the user based on the login credentials
        $token = $this->guard()->attempt($this->credentials($request));

        if( ! $token)
        {
            return false;
        }

        //get the authenticated user
        $user = $this->guard()->user();

        if($user instanceof MustVerifyEmail && ! $user->hasVerifiedEmail()){
            return false;
        }

        //set the user token
        $this->guard()->setToken($token);

        return true;
    }

    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);

        //get the token from the authenticated guard (JWT)
        $token = (string)$this->guard()->getToken();

        //extract the expiry date of the token
        $expiration = $this->guard()->getPayload()->get('exp');

        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $expiration
        ]);
    }
    

    protected function sendFailedLoginResponse()
    {
        $user = $this->guard()->user();

        if($user instanceof MustVerifyEmail && ! $user->hasVerifiedEmail()){
            return response()->json(["errors" => [
                "verification" => "Duhet te verifikosh Emailin e Llogarise"
            ]]);

            throw ValidationException::withMessages([
                $this->username() => "Kredenciale te gabuara"
            ]);
        }
    }

    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Dolet nga llogaria me sukses']);
    }












    // public function __construct()
    // {
    //       $this->middleware('guest')->except('logout', 'userLogout');
    // }

    // public function login(Request $request)
    // {
    //     if($request->isMethod('post'))
    //     {
    //         Session::forget('error_message');
    //         Session::forget('success_message');
    //         $data = $request->all();
    //         //echo "<pre>"; print_r($data); die;
    //         if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']]))
    //         {
    //             //Check Email is activated or not
    //             $userStatus = User::where('email', $data['email'])->first();
    //             if($userStatus->status == 0){
    //                  Auth::guard('web')->logout();
    //                  $message = "Your account is not activated yet! Please confirm your email to activate!";
    //                  Session::put('error_message', $message);
    //                  return redirect()->back();
    //             }
    //             //update user cart with user id
    //             if(!empty(Session::get('session_id'))){
    //                 $user_id = Auth::user()->id;
    //                 $session_id = Session::get('session_id');
    //                 Cart::where('session_id', $session_id)->update(['user_id'=>$user_id]);
    //             }
    //                 return redirect('/user-account');
    //         }else
    //         {
    //                 $message = "Invalid Emaild or Password";
    //                 Session::flash('error_message', $message);
    //                 return redirect()->back();
    //         }
    //     }
    // }

    // public function userLogout(Request $request)
    // {
    //     Auth::guard('web')->logout();
    //     Session::flush();
    //     return redirect('/');
    // }

    // protected function guard()
    // {
    //     return Auth::guard();
    // }
}
