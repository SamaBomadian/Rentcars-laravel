@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            {{-- <h2 class="fw-bold mb-4">
                Profile
            </h2> --}}

            <div class="card shadow border-0 rounded-4 mb-4">

                <div class="card-header bg-primary text-white">
                    Profile Information
                </div>

                <div class="card-body">

                    @include('profile.partials.update-profile-information-form')

                </div>

            </div>

            <div class="card shadow border-0 rounded-4 mb-4">

                <div class="card-header bg-success text-white">
                    Update Password
                </div>

                <div class="card-body">

                    @include('profile.partials.update-password-form')

                </div>

            </div>

            <div class="card shadow border-0 rounded-4">

                <div class="card-header bg-danger text-white">
                    Delete Account
                </div>

                <div class="card-body">

                    @include('profile.partials.delete-user-form')

                </div>

            </div>

        </div>

    </div>

</div>

@endsection