<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Rules\CheckSamePassword;
use App\Http\Resources\UserResource;

class SettingController extends Controller
{
    

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'name' => ['required'],
            'phone' => ['required']
        ]);

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone
        ]);

        return new UserResource($user);
    }

    public function updatePassword(Request $request)
    {
        // current user password
        // new password
        // password confirmation
        $this->validate($request, [
            'current_password' => ['required', new MatchOldPassword],
            'password' => ['required', 'confirmed', 'min:8', new CheckSamePassword],
        ]);

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        return response()->json(['message' => 'Password updated successfully'], 200);
    }

}
