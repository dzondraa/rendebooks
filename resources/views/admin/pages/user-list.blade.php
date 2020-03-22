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
@include('shared.modals.edit-user')
@section('scripts')
    <script>
        const siteUrl = document.location.origin

        const userModule = user()
        userModule.setupAjax()
        userModule.showAll()

        // USER MODULE
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

            // SETUPS HEADER FOR AJAX CALL
            function setupAjax() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN' : '{{csrf_token()}}'
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
                console.log('USER ROLE' , user)
                document.querySelector('#first_name').value = user.first_name
                document.querySelector('#last_name').value = user.last_name
                document.querySelector('#username').value = user.username
                document.querySelector('#email').value = user.email
                document.querySelector('#phone_number').value = user.phone_number
                $('#role-dropdown option[value="'+user.role+'"]').attr("selected", "true")
            }

            return { deleteUser, setupAjax, showAll, generateTable, showModal };
        }
    </script>
@endsection

