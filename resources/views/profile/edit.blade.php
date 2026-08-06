@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 space-y-4">

            {{-- Title --}}
            <h2 class="fw-bold text-dark mb-4">Account Settings</h2>

            {{-- Update Profile Form --}}
            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Update Password Form --}}
            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Delete Account Form --}}
            <div class="card border-0 shadow-sm rounded-4 p-4 border-danger">
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</div>
@endsection