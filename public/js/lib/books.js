function booksModule() {

    function previewPhoto(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#uploaded-photo').html(
                    `<img style="height: 100px; width: auto" src='${e.target.result}'>`
                )
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewMultiplePhotos(input) {
        if (input.files && input.files[0]) {
            for (let i = 0; i < input.files.length; i++) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#uploaded-gallery').append(`<img style="height: 100px; width: auto" src='${e.target.result}'>`)
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    }


    return { previewPhoto, previewMultiplePhotos }
}
