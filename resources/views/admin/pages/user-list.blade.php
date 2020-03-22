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
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody id="userTableBody">


            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
    // IMPORT FOR USER MODULE LIB
    <script src="{{asset('js/lib/users.js')}}"></script>
    <script>
        const siteUrl = document.location.origin

        const userModule = user()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : '{{csrf_token()}}'
            }
        })
        userModule.showAll()

    </script>

@endsection
@include('shared.modals.edit-user')


