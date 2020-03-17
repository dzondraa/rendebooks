@extends('admin.layouts.admin-layout')

@section('content')
    <div class="container">
        <h1 class="text-center">User list</h1>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <table class="table table-hover table-dark">
            <thead>
            <tr>
                <th scope="col">#id</th>
                <th scope="col">Username</th>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone number</th>
                <th scope="col">Role</th>
            </tr>
            </thead>
            <tbody>
            @php($counter = 1);
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$counter++}}</th>
                    <td>{{$user->username}}</td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone_number}}</td>
                    <td>{{$user->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
