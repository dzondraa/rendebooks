@extends('admin.layouts.admin-create')

@section('add-on-scripts')
    <script src="{{asset('js/lib/books.js')}}"></script>
    <script src="{{asset('js/lib/helpers.js')}}"></script>
    <script>
        const bookModule = booksModule()
        const helpers = helperModule()

        $('#photo').change(function() {
            bookModule.previewPhoto(this)
        })

        $('#gallery').change(function() {
            bookModule.previewMultiplePhotos(this)
        })

        //TODO - Change this array with real json array of objects form database which contains categories
        const categories = [
            {
                id: 1,
                value: 'Knjige'
            },
            {
                id: 2,
                value: 'E-Knjige'
            }
        ]

        helpers.populateDropdown('category', categories)

    </script>
@endsection
