<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function admin() {
        return view('admin.pages.index');
    }
}
