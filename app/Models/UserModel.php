<?php


namespace App\Models;


use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class UserModel
{

    // Get all user records or 1 single if id is passed
    public  function get($id = null) {
        if($id == null) {
            return DB::table('users')->join('roles' , 'users.role', '=', 'roles.id')->get();
        } else {
            return DB::table('users')->where('id', '=', $id)->get();
        }
    }

    public  function getUser($username, $password) {
        return DB::table('users')
            ->where([
                ['username', '=', $username],
                ['password', '=', md5($password)]
            ])
            ->get();
    }

    public function getRoles() {
        return DB::table('roles')->get();
    }
}
