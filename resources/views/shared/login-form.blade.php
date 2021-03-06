@extends('layouts.app')
@section('content')
   <div class="container" style="margin: 200px auto 400px auto">
       <form method="post" action="{{route('login')}}">
           @csrf
           <div class="form-group">
               <label for="exampleInputEmail1">Email address</label>
               <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
               <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
           </div>
           <div class="form-group">
               <label for="exampleInputPassword1">Password</label>
               <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
           </div>
           <div class="form-group form-check">
               <input type="checkbox" name="submit" class="form-check-input" id="exampleCheck1">
               <label class="form-check-label" for="exampleCheck1">Check me out</label>
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
       </form>
       @if(session()->has('user'))
           <a href="{{route('logout')}}">Logout</a>
       @endif
       <link rel="stylesheet" href="{{asset('/css/app.css')}}">
   </div>

@endsection
