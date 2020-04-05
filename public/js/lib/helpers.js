function helperModule() {

    // Helper function for populating select tag with options
    // for that entity
    // @Param String name => Name attr of select tag
    // @Param Array<Object> options => Options objects containing id and value
    function populateDropdown(name, options) {
        let str = ''
        options.forEach(opt => {
            str += `<option id="${opt.id}"> ${opt.value} </option>>`
        })
        console.log(document.getElementsByName(name)[0])
        document.getElementsByName(name)[0].innerHTML += str;
    }

    return { populateDropdown }
}
