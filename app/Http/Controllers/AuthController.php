<?php

namespace App\Http\Controllers;

use App\Helpers\AuthCommon;
use App\Models\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        $auth = AuthCommon::user();
        if (isset($auth->username)) {
            return redirect('admin/dashboard');
        }
        return view("auth.login");
    }

    public function login_process(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credential = $request->only('username', 'password');

        if (AuthCommon::check_credential($credential)) {
            $user = AuthCommon::getUser();
            $slug = [];
            $permit = RolePermission::where('role_uid', $user->role->uid)->get();
            foreach ($permit as $k => $v) {
                $slug[] = $v->permissions->slug;
            }
            AuthCommon::setUser($user);
            app('session')->put('slug_permit', $slug);
            return redirect('/admin/dashboard');
            // if(in_array($user->role_id, [2,3])){
            // } 

            AuthCommon::logout();
        }

        // if (AuthCommon::check_credential($credential)) {
        //     $user = AuthCommon::getUser();
        //     AuthCommon::setUser($user);
        //     $role = $user->role->slug;
        //     app('session')->put('role_permit', $role);
        //     if ($role == "client") {
        //         return redirect('/inventory/backup-data');
        //     } else {
        //         return redirect('/inventory/dashboard');
        //     }

        //     AuthCommon::logout();
        // }


        return redirect('/admin/login')
            ->withInput()
            ->withErrors(['login_failed' => 'Username atau password anda salah.']);
    }

    public function logout()
    {
        AuthCommon::logout();
        return redirect('/admin/login');
    }
}
