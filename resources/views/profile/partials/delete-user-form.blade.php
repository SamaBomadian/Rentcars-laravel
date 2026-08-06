<section>
    <header class="mb-3">
        <h5 class="fw-bold text-danger">
            {{ __('Delete Account') }}
        </h5>

        <p class="text-muted small mb-0">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <!-- Trigger Button for Bootstrap Modal -->
    <button type="button" class="btn btn-danger rounded-pill px-4 fw-semibold mt-2" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
        {{ __('Delete Account') }}
    </button>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow">
                
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold text-dark" id="confirmUserDeletionModalLabel">
                            {{ __('Are you sure you want to delete your account?') }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body py-3">
                        <p class="text-muted small mb-3">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>

                        <div class="mb-3">
                            <label for="password" class="form-label visually-hidden">{{ __('Password') }}</label>
                            <input
                                id="password"
                                name="password"
                                type="password"
                                class="form-control rounded-3 @if($errors->userDeletion->has('password')) is-invalid @endif"
                                placeholder="{{ __('Enter your password') }}"
                                required
                            />
                            @if($errors->userDeletion->has('password'))
                                <div class="invalid-feedback d-block mt-1">
                                    {{ $errors->userDeletion->first('password') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-light rounded-pill px-4 text-secondary" data-bs-dismiss="modal">
                            {{ __('Cancel') }}
                        </button>
                        <button type="submit" class="btn btn-danger rounded-pill px-4 fw-semibold">
                            {{ __('Delete Account') }}
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>