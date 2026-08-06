<section>
    <header class="mb-4">
        <h5 class="fw-bold text-dark">
            {{ __('Update Password') }}
        </h5>

        <p class="text-muted small mb-0">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    {{-- رسالة النجاح عند تغيير كلمة المرور --}}
    @if (session('status') === 'password-updated')
        <div class="alert alert-success alert-dismissible fade show rounded-3 mb-3" role="alert">
            {{ __('Password updated successfully!') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="mb-3">
            <label for="update_password_current_password" class="form-label fw-semibold text-secondary">
                {{ __('Current Password') }}
            </label>
            <input 
                id="update_password_current_password" 
                name="current_password" 
                type="password" 
                class="form-control rounded-3 @if($errors->updatePassword->has('current_password')) is-invalid @endif" 
                autocomplete="current-password" 
                required
            />
            @if($errors->updatePassword->has('current_password'))
                <div class="invalid-feedback d-block mt-1">
                    {{ $errors->updatePassword->first('current_password') }}
                </div>
            @endif
        </div>

        <!-- New Password -->
        <div class="mb-3">
            <label for="update_password_password" class="form-label fw-semibold text-secondary">
                {{ __('New Password') }}
            </label>
            <input 
                id="update_password_password" 
                name="password" 
                type="password" 
                class="form-control rounded-3 @if($errors->updatePassword->has('password')) is-invalid @endif" 
                autocomplete="new-password" 
                required
            />
            @if($errors->updatePassword->has('password'))
                <div class="invalid-feedback d-block mt-1">
                    {{ $errors->updatePassword->first('password') }}
                </div>
            @endif
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="update_password_password_confirmation" class="form-label fw-semibold text-secondary">
                {{ __('Confirm Password') }}
            </label>
            <input 
                id="update_password_password_confirmation" 
                name="password_confirmation" 
                type="password" 
                class="form-control rounded-3 @if($errors->updatePassword->has('password_confirmation')) is-invalid @endif" 
                autocomplete="new-password" 
                required
            />
            @if($errors->updatePassword->has('password_confirmation'))
                <div class="invalid-feedback d-block mt-1">
                    {{ $errors->updatePassword->first('password_confirmation') }}
                </div>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary rounded-pill px-4 fw-semibold">
                {{ __('Save') }}
            </button>
        </div>
    </form>
</section>