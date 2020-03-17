<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function index() {
        return view('shared.login-form');
    }

    public function create() {
        return view('shared.login-form');
    }

    public function login(Request $request) {
        $user = $this->model->getUser($request->get('username'), $request->get('password'));
        if(!$user->isEmpty()) {
            session()->put('user', $user->first());
            if($user->first()->role == 1) {
                return redirect('/admin');
            } else {
                return redirect('/');
            }
        }
        return redirect('/login');

    }

    public function logout() {
        if(session()->has('user')){
            session()->forget('user');
            return redirect('/');
        }
    }

}
