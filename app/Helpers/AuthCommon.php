<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthCommon
{

    function __construct() {}

    public static $token;

    public static function setUser($body)
    {
        @app('session')->forget('user');
        return app('session')->put('user', $body);
    }

    public static function check_credential($credential)
    {
        if (Auth::attempt($credential)) {
            return true;
        } else {
            return false;
        }
    }

    public static function getUser()
    {
        $uid = Auth::user()->uid;
        $user = User::find($uid);
        return $user;
    }

    public static function user()
    {
        return session('user');
    }

    public static function logout()
    {
        app('session')->invalidate();
        app('session')->regenerateToken();
        return app('session')->forget('user');
    }
}
