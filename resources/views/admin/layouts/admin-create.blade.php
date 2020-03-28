@extends('admin.layouts.admin-layout')

@php
    $schema = config('schema.'. $schema);
    $storeRouteName = $schema['store-route-name']
@endphp
@yield('')
@section('content')
    <div class="container">
        <h1 class="text-center">Create {{ $schema['title'] }}</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route($storeRouteName)}}" method="post">
            @csrf
            @foreach($schema['fields'] as $field)
                <div class="form-group">
                    <label>{{ $field['label'] }}</label>
                    @if($field['type'] == 'textarea')
                        <textarea
                            class="form-control"
                            name="{{ $field['name'] }}"
                            id="{{ $field['name'] }}"
                            rows="{{ array_key_exists('rows', $field) ? $field['rows'] : '3'}}"
                        ></textarea>
                    @else
                        @if($field['type'] == 'select')
                            <select name="{{ $field['name'] }}" class="form-control" id="exampleFormControlSelect1">
                                @foreach($field['options'] as $key => $opt)
                                    <option  value="{{ $key }}" id="{{$key}}">{{$opt}}</option>
                                @endforeach
                            </select>
                        @endif
                        <input type="{{ $field['type'] }}"
                               id="{{ $field['name'] }}"
                               name="{{ $field['name'] }}"
                               class="form-control"
                               placeholder="{{  array_key_exists('placeholder', $field) ? $field['placeholder'] : "" }}"
                        @if(array_key_exists('multiple', $field))
                            {{ $field['multiple'] == true ? 'multiple' : '' }}
                        @endif
                        >
                        @if($field['type'] == 'file')
                            <div id="uploaded-{{ $field['name'] }}" style="padding: 10px;"></div>
                        @endif()
                    @endif

                </div>
            @endforeach

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Create user</button>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    @yield('add-on-scripts')
@endsection

