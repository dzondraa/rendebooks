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
        $user = $this->model->login($request->get('username'), $request->get('password'));
        if(!$user->isEmpty()) {
            session()->put('user', $user->first());
        }
        return redirect('/login');
    }

    public function isAdmin() {
        return session()->get('user') && session()->get('user')->role == 1 ? true : false;
    }
}
