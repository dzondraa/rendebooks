<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\BaseControllers\UserBaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditUser;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends UserBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return $this->model->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $success = $this->model->insert($request->username, $request->first_name, $request->last_name, md5($request->password), $request->email, $request->phone_number, $request->role);
        if ($success) {
            return redirect('/admin/users-list')->with('message', 'User created successfuly!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUser $request, $id)
    {
        $validated = $request->validated();
        $this->model->update($id, $request->input());
    }
}
