<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    //

    public function changePassword(Request $request)
    {
        $user = Auth::user();
        $currentPassword = $request->get('current_password');
        $newPassword = $request->get('new_password');
        $confirmPassword = $request->get('new_password_confirmation');

        if (! Hash::check($request->get('current_password'), $user->password)) {
            return redirect()->back()->with("error", "Mật khẩu hiện tại không đúng.");
        }

        if (!Hash::check($currentPassword, $user->password)) {
            return redirect()->back()->with("error", "Mật khẩu hiện tại không đúng.");
        }

        if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            return redirect()->back()->with("error", "Mật khẩu mới không được giống với mật khẩu hiện tại.");
        }

        if ($request->get('new_password') !== $request->get('new_password_confirmation')) {
            return redirect()->back()->with("error", "Mật khẩu xác nhận không khớp.");
        }

        $user->password = Hash::make($request->get('new_password'));
        $user->save();

        return redirect()->back()->with("success", "Mật khẩu của bạn đã được thay đổi thành công.");
    }
}
