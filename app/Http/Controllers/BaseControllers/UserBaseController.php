<?php

namespace App\Http\Controllers\BaseControllers;

use App\Http\Requests\EditUser;
use App\Models\UserModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class UserBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->middleware('userRegistrationValidator', ['only' => ['store']]);
    }

    public function index()
    {
        return $this->model->get();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->model->getRoles();
        return view('admin.layouts.admin-create')->with('schema', 'user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public abstract function store(Request $request);


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->model->get($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public abstract function edit($id);

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = $this->model->delete($id);
        return $this->model->get();
    }
}
