<div class="modal fade edit-user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content container" style="padding-top:25px !important;">
            <form action="{{route('users.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>First name</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First name">
                </div>
                <div class="form-group">
                    <label>Last name</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" id="username" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>Phone number</label>
                    <input type="text" id="phone_number" class="form-control" name="phone_number" placeholder="Phone number">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">User role</label>
                    <select name="role" id="role-dropdown" class="form-control" id="exampleFormControlSelect1">
                        <option value="0">Select user role</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>
                <div class="form-group">
                    <button data-id="" type="button" id="edit-user-button" class="btn btn-primary btn-lg btn-block">Update user</button>
                </div>
            </form>
        </div>
    </div>
</div>

