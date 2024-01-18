<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // $this->middleware('auth');
        //$this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verify(Request $request, User $user) {
        $user = User::findOrFail($request->route('id'));

        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($user->hasVerifiedEmail()) {
            $notification = array(
                'message' => 'Email është verifikuar më parë.',
                'alert-type' => 'success'
            );
            return redirect()->route('home')->with($notification);
            // return response()->json(["errors" => ["message" => "Email address already verified"]], 422);
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        if ($response = $this->verified($request)) {
            return $response;
        }
        return redirect()->route('user-verification');
        // return response()->json(['message' => 'Email successfully verified'], 200);
    }

    public function resend(Request $request) {
        $this->validate($request, [
            'email' => ['email', 'required']
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(["errors" => [
                "email" => "Asnje perdorues nuk ekzisto me kete email"
            ]], 422);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json(["errors" => [
                "message" => "Ky email eshte i verifikuar"
            ]], 422);
        }

        $user->sendEmailVerificationNotification();

        return response()->json(['status' => "Verification link resend"]);


    }
}
