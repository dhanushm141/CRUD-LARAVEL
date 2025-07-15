@extends('app')

@section('content')

<!-- SweetAlert2 for Success Messages -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4 fw-bold text-primary">Student Registration</h2>
                    <form action="/post" method="POST" id="createform">
                        @csrf

                        <!-- Name -->
                        <div class="form-floating mb-3">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                            <label for="name">Full Name</label>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                            <label for="email">Email address</label>
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Mobile -->
                        <div class="form-floating mb-3">
                            <input type="tel" name="mobile" class="form-control" placeholder="Mobile" minlength="10" maxlength="10" value="{{ old('mobile') }}">
                            <label for="mobile">Mobile Number</label>
                            @error('mobile') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Birthdate -->
                        <div class="form-floating mb-3">
                            <input type="date" name="birthdate" class="form-control" max="{{ date('Y-m-d') }}" value="{{ old('birthdate') }}">
                            <label for="birthdate">Birthdate</label>
                            @error('birthdate') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Username -->
                        <div class="form-floating mb-3">
                            <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
                            <label for="username">Username</label>
                            @error('username') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <label for="password">Password</label>
                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-floating mb-3">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                            <label for="password_confirmation">Confirm Password</label>
                            @error('password_confirmation') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Gender -->
                        <div class="mb-3">
                            <label class="form-label d-block">Gender</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genderMale">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genderFemale">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderOther" value="Not Mentioned" {{ old('gender') == 'Not Mentioned' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genderOther">Prefer Not to Say</label>
                            </div>
                            @error('gender') <br><small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Country -->
                        <div class="form-floating mb-3">
                            <select class="form-select" name="country" id="country">
                                <option value="" disabled selected>Select Country</option>
                                <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                                <option value="SriLanka" {{ old('country') == 'SriLanka' ? 'selected' : '' }}>SriLanka</option>
                                <option value="Others" {{ old('country') == 'Others' ? 'selected' : '' }}>Others</option>
                            </select>
                            <label for="country">Country</label>
                            @error('country') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-primary" id="btn" type="submit">Register</button>
                            <a href="/" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Disable Submit Button on Submit -->
<script>
    document.getElementById('createform').addEventListener('submit', function () {
        document.getElementById('btn').disabled = true;
    });
</script>

<!-- SweetAlert on Success -->
@if (session('alert'))
<script>
    window.onload = function () {
        Swal.fire({
            title: 'Success!',
            text: "{{ session('alert') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('post.index') }}";
            }
        });
    };
</script>
@endif

@endsection
