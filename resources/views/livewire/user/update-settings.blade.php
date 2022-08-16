<div class="col-md-12">
    <div class="d-flex justify-content-between mt-3 mb-5">
        <div class="header-custom-medium">User Settings</div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form wire:submit.prevent="updateUserSettings">
        @csrf

        <div class="row mt-1">
            <div class="col-md-12">
                <div class="custom-blog-tip py-2 px-3">
                    <i class="bi bi-exclamation-circle me-3" style="font-size: 20px;"></i>Leave password fields empty if you do not wish to modify password
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="">
                    <label class="form-label" for="name">Full name</label>
                    <input class="form-control" id="name" name="name" wire:model="user.name">
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" id="email" name="email" wire:model="user.email">
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="">
                    <label class="form-label" for="password">Current Password</label>
                    <input class="form-control" type="password" id="password" name="password" wire:model="old_password">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-3">
                <div class="">
                    <label class="form-label" for="newPassword">New password</label>
                    <input class="form-control" type="password" id="newPassword" name="newPassword"
                           wire:model="new_password">
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="">
                    <label class="form-label" for="newPasswordConfirm">Confirm new password</label>
                    <input class="form-control" type="password" id="newPasswordConfirm" name="newPasswordConfirm"
                           wire:model="new_password_confirmation">
                </div>
            </div>
        </div>
        <div class="container mt-5 mb-5 text-center">
            <button type="submit" class="btn btn-custom-warning mx-2">Update Settings</button>
        </div>
    </form>
</div>
