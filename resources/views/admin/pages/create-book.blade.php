@extends('admin.layouts.admin-layout')

@php
    $schema = config('schema.book');
@endphp
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

        <form action="{{route('books.store')}}" method="post">
            @csrf
{{--            <div class="form-group">--}}
{{--                <label>Title</label>--}}
{{--                <input type="text" name="title" class="form-control" placeholder="Book title">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="description">Description</label>--}}
{{--                <textarea class="form-control" name="description" id="description" rows="6"></textarea>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="teaser">Teaser</label>--}}
{{--                <textarea class="form-control" id="teaser" name="teaser" rows="6"></textarea>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label>ISBN</label>--}}
{{--                <input type="text" id="isbn" name="isbn" decimal='0' max="2020" min="1800" class="form-control" placeholder="isbn">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label>Publishing year</label>--}}
{{--                <input type="number" name="isbn" decimal='0' max="2020" min="1800" class="form-control" id="publishing_year" name="publishing_year">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label>Price</label>--}}
{{--                <input type="number" name="isbn" class="form-control" id="price" name="price">--}}
{{--            </div>--}}
{{--            <label>Book photo</label>--}}
{{--            <div style="height: 150px" class="form-group">--}}
{{--                <input type="file" class="form-control-file" id="photo">--}}
{{--                <div id="uploaded-photo" style="padding: 10px;"></div>--}}
{{--            </div>--}}
{{--            <label>Book gallery</label>--}}
{{--            <div style="height: 150px" name="photo" class="form-group">--}}
{{--                <input type="file" name="gallery" class="form-control-file" id="gallery" multiple>--}}
{{--                <div id="uploaded-gallery" style="padding: 10px;"></div>--}}
{{--            </div>--}}


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
    <script src="{{asset('js/lib/books.js')}}"></script>
    <script>
        const bookModule = booksModule()
        $('#photo').change(function() {
            bookModule.previewPhoto(this)
        })

        $('#gallery').change(function() {
            bookModule.previewMultiplePhotos(this)
        })




    </script>
@endsection
