<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $user = $this->tryLogin($request->get('username'), $request->get('password'));
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

    public  function apiLogin (Request $request) {

        $request = json_decode($request->getContent());
        $user = $this->tryLogin($request->username, $request->password);
        if(!$user->isEmpty()) {
            return $user;
        }
        return response()->json(['message' => 'Bad login'] , 401);
    }

    /**
     * Client Login
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postLogin(Request $request)
    {
        $request = json_decode($request->getContent());

        $user = $this->model->getUser($request->username, $request->password)[0];

        if($user) {
            // Update Token
            $str = Str::random(60);
            $apiToken = uniqid(base64_encode($str));
            $this->model->updateToken($request->username, $apiToken);
            $user->api_token = $apiToken;
            return response()->json($user);
        } else {
            return response()->json([
                'message' => 'User not found',
            ]);
        }

    }


    private function tryLogin($username, $password) {
        return $this->model->getUser($username, $password);
    }

    public function logout() {
        if(session()->has('user')){
            session()->forget('user');
            return redirect('/');
        }
    }

}
