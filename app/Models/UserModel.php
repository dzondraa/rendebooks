<?php


namespace App\Models;


use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserModel
{

    // Get all user records or 1 single if id is passed
    public  function get($id = null) {
        if($id == null) {
            return DB::table('users')->select('users.*' , 'users.id as uid', 'roles.*')->join('roles' , 'users.role', '=', 'roles.id')->get();
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

    public function insert($username, $first_name, $last_name, $password, $email, $phoneNumber, $roleId) {
        $success = null;
        try {
            $success = DB::table('users')->insert(
                [
                    'username' => $username,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'password' => $password,
                    'email' => $email,
                    'phone_number' => $phoneNumber,
                    'role' => $roleId
                ]
            );
        } catch (\PDOException $exception) {
            Log::alert($exception->getMessage());
        }
        return $success;

    }

    public function delete($id) {
        try {
            $res = DB::table('users')->where('id', '=', $id)->delete();
        } catch (\PDOException $exception) {
            Log::alert($exception->getMessage());
        }
       return $this->get()->all();
    }

    public function update($id, $data) {
        $data = (object)$data;
        try {
            DB::table('users')
                ->where('id', '=', $id)
                ->update([
                    'first_name' => $data->first_name,
                    'last_name' => $data->last_name,
                    'email' => $data->email,
                    'username' => $data->username,
                    'role' => $data->role,
                    'phone_number' => $data->phone_number,
                ]);
        } catch (\PDOException $exception) {
            Log::error($exception->getMessage());
        }

    }

    public function updateToken($username, $token) {
        try {
            DB::table('users')
                ->where('username', '=', $username)
                ->update([
                    'api_token' => $token
                ]);
        } catch (\PDOException $exception) {
            Log::error($exception->getMessage());
        }

    }
}
