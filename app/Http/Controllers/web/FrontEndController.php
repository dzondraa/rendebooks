<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontEndController extends Controller
{
    public function admin() {
        return view('admin.pages.index');
    }

    public function userList() {
        return view('admin.pages.user-list');
    }
}
