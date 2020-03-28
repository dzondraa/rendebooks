@extends('admin.layouts.admin-create')

@section('add-on-scripts')
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
