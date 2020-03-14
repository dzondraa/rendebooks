<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class UserModel
{

    // Get all user records or 1 single if id is passed
    public  function get($id = null) {
        if($id == null) {
            DB::table('users')->get();
        } else {
            DB::table('users')->where('id', '=', $id)->get();
        }
    }

    public  function login($username, $password) {
        $user = DB::table('user')
            ->where('username' ,'=' , $username)
            ->where('password', '=', md5($password))->get();
        if($user) {
            return $user;
        }
        else {
            return null;
        }
    }
}
