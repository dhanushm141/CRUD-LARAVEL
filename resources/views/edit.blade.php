@extends('app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-4 border-0">
                <div class="card-header bg-warning text-white text-center rounded-top-4">
                    <h3 class="mb-0">Update Student</h3>
                </div>
                <div class="card-body px-5 py-4">
                    <form action="{{ url('/post/'.$edit->id) }}" method="POST" id="updateform">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Student Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $edit->name }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Student E-mail</label>
                            <input type="text" name="email" class="form-control" value="{{ $edit->email }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Student Mobile</label>
                            <input type="tel" name="mobile" class="form-control" maxlength="10" minlength="10" value="{{ $edit->mobile }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Birth Date</label>
                            <input type="date" name="birthdate" class="form-control" value="{{ $edit->birthdate }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" value="{{ $edit->username }}">
                        </div>

                        @if(is_null($edit->password))
                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter new password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label d-block">Gender</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="Male" {{ $edit->gender == 'Male' ? 'checked' : '' }}>
                                <label class="form-check-label">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="Female" {{ $edit->gender == 'Female' ? 'checked' : '' }}>
                                <label class="form-check-label">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="Not Mentioned" {{ $edit->gender == 'Not Mentioned' ? 'checked' : '' }}>
                                <label class="form-check-label">Prefer Not to Say</label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Country</label>
                            <select class="form-select" name="country">
                                <option value="">Select</option>
                                <option value="India" {{ $edit->country == 'India' ? 'selected' : '' }}>India</option>
                                <option value="SriLanka" {{ $edit->country == 'SriLanka' ? 'selected' : '' }}>SriLanka</option>
                                <option value="Others" {{ $edit->country == 'Others' ? 'selected' : '' }}>Others</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-center gap-3">
                            <button type="submit" class="btn btn-success px-4">Update</button>
                            <a href="{{ route('post.index') }}" class="btn btn-danger px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session('alert'))
<script type="text/javascript">
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
