<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAdmin() {
        return view('user.admin');
    }

    public function adminLogin(Request $request) {
        $formData = $request->validate([
            "username" => "required",
            "password" => "required",
        ]);

        if(auth()->attempt($formData)) {
            $request->session()->regenerate();

            return redirect("/");
        } else {
            return redirect("/admin");
        }
    }

    public function adminLogout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }
}
