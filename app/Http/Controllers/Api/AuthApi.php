<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthApi extends Controller
{
    public function changePassword() {
        $user_id = request()->user_id;
        $current_password = request()->currentPassword;
        $new_password = request()->newPassword;

        $user = User::where('id', $user_id)->first();

        if(Hash::check($current_password,$user->password)){
            User::where('id',$user_id)->update([
                'password' => Hash::make($new_password)
            ]);
            return response()->json([
                'message' => true,
                'data' => null
            ]);
        }
        return response()->json([
            'message' => false,
            'data' => "Wrong Password"
        ]);

    }

    public function showProfile() {
        $user_id = request()->user_id;
        $user = User::where('id', $user_id)->first();
        return response()->json([
            'message' => true,
            'data'=> $user
        ]);
    }

    public function changeProfile() {
        $user_id = request()->user_id;
        $new_name = request()->name;
        $new_phone = request()->phone;
        $new_address = request()->address;

        User::where('id', $user_id)->update([
            'name' => $new_name,
            'phone' => $new_phone,
            'address' => $new_address,
        ]);

        return response()->json([
            'message' => true,
            'data'=> null
        ]);
    }
}
