<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AdminLoginController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }
    
    protected function guard()
    {
        return Auth::guard('admin');
    }
    
    public function login(Request $request)
    {
        //validate form data
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string|min:8'
        ]);

        //atempt to login as admin
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            return redirect()->intended(url('/app/dashboard'));
        }else{
            Session::flash('error_message', 'Emaili ose Passwordi eshte i gabuar');
            return redirect()->back()->with($request->only('email', 'remember'));
        }
        return view('auth.admin-login');
    }

   
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/app/login/auth');
    }
}
