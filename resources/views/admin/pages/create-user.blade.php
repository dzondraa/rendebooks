@extends('admin.layouts.admin-layout')

@section('content')
    <div class="container">
        <h1 class="text-center">Create user</h1>
        <form action="{{route('users.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label>First name</label>
                <input type="text" name="first_name" class="form-control" placeholder="First name">
            </div>
            <div class="form-group">
                <label>Last name</label>
                <input type="text" name="last_name" class="form-control" placeholder="Last name">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="last_name" placeholder="Username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="password" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">User role</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option value="0">Select user role</option>
                    @foreach($roles as $role)
                        <option name="role[]" value="{{$role->id}}" id="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Create user</button>
            </div>
        </form>
    </div>
@endsection
