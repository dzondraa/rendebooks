<?php


namespace App\Models;


use Illuminate\Routing\Route;
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
        $user = DB::table('users')
            ->where('username' ,'=' , $username)
            ->get();
        return $user;
    }
}
