function user() {

    function showAll() {
        let usersList = [];
        $.ajax({
            url: `${siteUrl}/admin/users`,
            method: 'GET',
            success(data) {
                generateTable(data)
            },
            error(x,hr) {
                console.error(x)
            }
        })
    }

    // AJAX CALL FOR DELETEING USER RECORD
    function deleteUser(id) {
        let usersList = [];
        $.ajax({
            url: `/admin/users/${id}`,
            method: 'DELETE',
            success(data) {
                generateTable(data)
            },
            error(x,hr) {
                console.error(x)
            }
        })

        return usersList;
    }

    function generateTable(users) {
        let str = '';
        users.forEach(user => {
            str += `
                        <tr>
                            <th scope="row">${user.uid}</th>
                            <td>${user.username}</td>
                            <td>${user.first_name}</td>
                            <td>${user.last_name}</td>
                            <td>${user.email}</td>
                            <td>${user.phone_number}</td>
                            <td>${user.name}</td>
                            <td>
                                <button data-id="${user.uid}" type="button" class="btn user-delete btn-danger">Delete</button>
                                <button data-id="${user.uid}" type="button" class="btn btn-info user-edit" data-toggle="modal" data-target=".edit-user">Edit</button>
                            </td>
                        </tr>
                    `
        })

        document.querySelector("#userTableBody").innerHTML = str;
        $(".user-delete").click(function () {
            const userId = $(this).data('id')
            if (confirm('Are you sure you want to delete this user?')) {
                userModule.deleteUser(userId)
            } else {
                // Do nothing!
            }

        })
        $(".user-edit").click(function () {
            const userId = $(this).data('id')
            showModal(userId)

        })
    }

    function showModal(id) {
        clearFeedbacks()
        $.ajax({
            url: `${siteUrl}/admin/users/${id}`,
            method: 'GET',
            success(data) {
                populateModal(data[0])
            },
            error(x,hr) {
                console.error(x)
            }
        })
    }

    function populateModal(user) {
        document.querySelector('#first_name').value = user.first_name
        document.querySelector('#last_name').value = user.last_name
        document.querySelector('#username').value = user.username
        document.querySelector('#email').value = user.email
        document.querySelector('#phone_number').value = user.phone_number
        $('#edit-user-button').data('id' , user.id)
        $('#role-dropdown option[value="'+user.role+'"]').attr("selected", "true")
        $('#edit-user-button').click(function () {
            editUser($(this).data('id'))
        })
    }

    function editUser(id) {
        const user_id = id
        const first_name = document.querySelector('#first_name').value
        const last_name = document.querySelector('#last_name').value
        const username = document.querySelector('#username').value
        const email = document.querySelector('#email').value
        const phone_number = document.querySelector('#phone_number').value
        role = document.querySelector('#role-dropdown').options[document.querySelector('#role-dropdown').selectedIndex].value;
        $.ajax({
            url: siteUrl + `/admin/users/${id}`,
            method: 'PATCH',
            data: {
                id: id,
                first_name: first_name,
                last_name: last_name,
                username: username,
                email: email,
                phone_number: phone_number,
                role: role
            },
            success() {
                displaySuccessFeedback('User updated successfuly!' , 'errors')
                showAll()
            },
            error(x) {
                console.log()
                displayErrors(x.responseJSON.errors, 'errors')
            }
        })
    }

    function displayErrors(errors, div) {
        let str = '<div class="alert alert-danger" role="alert"><ul>';
        for (const prop in errors) {
            str += `<li>${errors[prop]}</li>`
        }
        str += '</ul></div>'
        document.querySelector(`#${div}`).innerHTML = str;
    }

    function displaySuccessFeedback(message, div) {
        document.querySelector(`#${div}`).innerHTML =
            `<div id="success" class="alert alert-success" role="alert">
                ${message}
            </div>`
    }

    function clearFeedbacks() {
        document.querySelector('#errors').innerHTML = '';
    }

    return { deleteUser, showAll, generateTable, showModal };
}
