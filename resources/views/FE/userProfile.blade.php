@extends('FE.master')
@section('title','My Profile')
@section('content')
    <div class="untree_co-section" style="padding-bottom: 2rem;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 text-center pt-5">
                    <div class="card text-white" style="background-color: #0e0e0f;">
                        <div class="card-header" style="color: #0e0e0f;background-color: #f7b500;">
                            Edit Profile
                            @if ($subscribe)
                                <span class="badge">Subscribed</span>
                            @endif
                        </div>
                        <div class="card-body">
                            <form method="POST" class="oleez-contact-form"
                                action="{{ route('updateProfile', auth()->user()->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    @if (auth()->user()->image == null)
                                        <center><img src="{{ auth()->user()->image_url }}" class="w-25 h-25"
                                                alt="User Profile"></center>
                                    @else
                                        <img src="{{ asset('images/users/' . auth()->user()->image) }}" class="w-25 h-25"
                                            alt="{{ auth()->user()->name }}">
                                    @endif
                                    <input type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/gif">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ auth()->user()->name }}" id="name">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ auth()->user()->email }}" readonly id="email">
                                </div>
                                <button type="submit" class="btn btn-submit">Update Profile</a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 text-center pt-5">
                    <div class="card text-white" style="background-color: #0e0e0f;">
                        <div class="card-header" style="color: #0e0e0f;background-color: #f7b500;">
                            Change Password
                        </div>
                        <div class="card-body">
                            <form method="POST" class="oleez-contact-form"
                                action="{{ route('changePwd', auth()->user()->id) }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="old_password" class="form-label">Old Password</label>
                                    <input type="password" name="old_password"
                                        class="form-control @error('old_password') is-invalid @enderror" id="old_password">
                                    @error('old_password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="new_password" class="form-label">New Password</label>
                                    <input type="password" name="new_password"
                                        class="form-control @error('new_password') is-invalid @enderror" id="new_password">
                                    @error('new_password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                    <input type="password" name="new_password_confirmation" class="form-control"
                                        id="new_password_confirmation">
                                </div>
                                <button type="submit" class="btn btn-submit">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
