<section>
    <header class="mb-4">
        <h5 class="fw-bold text-dark">
            {{ __('Profile Information') }}
        </h5>

        <p class="text-muted small mb-0">
            {{ __("Update your account's profile information, profile picture, and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- رسالة النجاح عند تحديث البيانات --}}
    @if (session('status') === 'profile-updated')
        <div class="alert alert-success alert-dismissible fade show rounded-3 mb-3" role="alert">
            {{ __('Profile updated successfully!') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <!-- Profile Picture Field -->
        <div class="mb-4 text-center text-md-start d-flex flex-column flex-md-row align-items-center gap-3">
            <div class="flex-shrink-0">
                <!-- إضافة id=profileImagePreview هنا للمعاينة -->
                @if (!empty($user->image))
                    <img id="profileImagePreview" src="{{ asset('storage/' . $user->image) }}" alt="Profile" class="rounded-circle object-fit-cover shadow-sm" width="80" height="80">
                @else
                    <img id="profileImagePreview" src="https://via.placeholder.com/80?text={{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}" alt="Profile" class="rounded-circle object-fit-cover shadow-sm" width="80" height="80">
                @endif
            </div>
            <div class="flex-grow-1 w-100">
                <label for="image" class="form-label fw-semibold text-secondary">{{ __('Profile Picture') }}</label>
                <!-- إضافة onchange لتشغيل سكربت التغيير -->
                <input 
                    id="image" 
                    name="image" 
                    type="file" 
                    class="form-control rounded-3 @error('image') is-invalid @enderror" 
                    accept="image/*"
                    onchange="previewImage(event)"
                />
                @error('image')
                    <div class="invalid-feedback d-block mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Full Name -->
        <div class="mb-3">
            <label for="name" class="form-label fw-semibold text-secondary">{{ __('Name') }}</label>
            <input 
                id="name" 
                name="name" 
                type="text" 
                class="form-control rounded-3 @error('name') is-invalid @enderror" 
                value="{{ old('name', $user->name) }}" 
                required 
                autofocus 
                autocomplete="name" 
            />
            @error('name')
                <div class="invalid-feedback d-block mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold text-secondary">{{ __('Email') }}</label>
            <input 
                id="email" 
                name="email" 
                type="email" 
                class="form-control rounded-3 @error('email') is-invalid @enderror" 
                value="{{ old('email', $user->email) }}" 
                required 
                autocomplete="username" 
            />
            @error('email')
                <div class="invalid-feedback d-block mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Phone Number -->
        <div class="mb-4">
            <label for="phone" class="form-label fw-semibold text-secondary">{{ __('Phone Number') }}</label>
            <input 
                id="phone" 
                name="phone" 
                type="text" 
                class="form-control rounded-3 @error('phone') is-invalid @enderror" 
                value="{{ old('phone', $user->phone) }}" 
                placeholder="Enter your phone number"
            />
            @error('phone')
                <div class="invalid-feedback d-block mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Save Button -->
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary rounded-pill px-4 fw-semibold">
                {{ __('Save') }}
            </button>
        </div>
    </form>
</section>

<!-- Script للمعاينة الفورية قبل الحفظ -->
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('profileImagePreview');
            output.src = reader.result;
        };
        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }
</script>