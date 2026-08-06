<section>

    <h4 class="fw-bold mb-3">
        Profile Information
    </h4>

    <p class="text-muted mb-4">
        Update your account's profile information and email address.
    </p>

    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST" action="{{ route('profile.update') }}">

        @csrf
        @method('PATCH')

        <div class="mb-3">

            <label for="name" class="form-label">
                Name
            </label>

            <input
                type="text"
                id="name"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name) }}"
                required
                autofocus>

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">

            <label for="email" class="form-label">
                Email
            </label>

            <input
                type="email"
                id="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email) }}"
                required>

            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

            <div class="alert alert-warning">

                <p class="mb-2">
                    Your email address is unverified.
                </p>

                <button
                    type="submit"
                    form="send-verification"
                    class="btn btn-outline-primary btn-sm">

                    Re-send Verification Email

                </button>

                @if (session('status') === 'verification-link-sent')

                    <div class="text-success mt-2">

                        A new verification link has been sent to your email address.

                    </div>

                @endif

            </div>

        @endif

        <div class="d-flex align-items-center gap-3">

            <button type="submit" class="btn btn-primary">

                Save Changes

            </button>

            @if (session('status') === 'profile-updated')

                <span class="text-success fw-semibold">

                    Profile updated successfully.

                </span>

            @endif

        </div>

    </form>

</section>