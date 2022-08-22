<div class="myaccount-content">
    <h5>Account Details</h5>
    <div class="account-details-form">
        <form action="{{route('user.profile.update')}}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-input-item">
                        <label for="first-name" class="required">Name</label>
                        <input type="text" name="fullName" value="{{$user->name}}" placeholder="Name" />
                    </div>
                </div>
            </div>
            <div class="single-input-item">
                <label for="display-name" class="required">Display Name</label>
                <input type="text" name="userName" value="{{$user->username}}" placeholder="Display Name" />
            </div>

            <div class="single-input-item">
                <label for="email" class="required">Email</label>
                <input type="email" name="email" value="{{$user->email}}" placeholder="Email Address" />
            </div>

            <fieldset>
                <legend>Password change</legend>
                <div class="single-input-item">
                    <label for="current-pwd" class="required">Current
                        Password</label>
                    <input type="password" name="old_password" placeholder="Current Password" />
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-input-item">
                            <label for="new-pwd" class="required">New
                                Password</label>
                            <input type="password" name="new_password" placeholder="New Password" />
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="single-input-item">
                <button type="submit" class="btn btn-sqr">Save Changes</button>
            </div>
        </form>
    </div>
</div>
