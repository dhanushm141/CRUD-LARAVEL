@extends('app')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.min.css">


 @section('content')
<div class='row'>
    <div class='col-md-6 offset-md-3 border rounded p-4 mt-2 shadow'>
        <center><h1>Registration Form</h1></center>
      <form action="/post" method="POST" id="createform">
            <div class="mb-3">
                <label for="" class="form-label">Student Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name')}}" id="name" >
                @error('name')
                <span class="text-danger">{{$message}}</span>
                    
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Student E-mail</label>
                <input type="text" name="email" class="form-control" value="{{old('email')}}">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
          
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Student Mobile</label>
                <input type="tel" name="mobile" class="form-control" minlength="10" maxlength="10" value="{{old('mobile')}}">
                @error('mobile')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Student Birth Date</label>
                <input type="date" class="form-control" name="birthdate" value="{{old('birthdate')}}"  max="{{ date('Y-m-d') }}" >
                @error('birthdate')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Student username</label>
                <input type="text" name="username" class="form-control" id="" value="{{old('username')}}" >
                @error('username')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Create Password</label>
                <input type="password" class="form-control" name="password"  >
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" >
                @error('password_confirmation')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            </div>
            <div class="mb-3 d-flex grid gap-3 ">
                <label for="" class="form-label">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexRadioDefault1" >
                    Male
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexRadioDefault2">
                     Female
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Not Mentioned" {{ old('gender') == 'Not Mentioned' ? 'checked' : '' }} >
                    <label class="form-check-label" for="flexRadioDefault2">
                      Prefer Not to Say
                    </label>
                    @error('gender')
                        <sapn class="text-danger">{{$message}}</sapn>
                    @enderror
                  </div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Country</label>
                <select class="form-select" aria-label="Default select example" name="country" >
                    <option selected>Select</option>
                    <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                    <option value="SriLanka" {{ old('country') == 'SriLanka' ? 'selected' : '' }}>SriLanka</option>
                    <option value="Others" {{ old('country') == 'Others' ? 'selected' : '' }}>Others</option>
                  </select>
            </div>
            @error('country')
            <sapn class="text-danger">{{$message}}</sapn>
        @enderror
            <input type="hidden" name="_token" value='{{csrf_token()}}'>
            <div class="d-flex justify-content-center grid gap-0 column-gap-3">
                             <button class="btn btn-success" id="btn">Submit</button>
                             <button class="btn btn-danger">Cancel</button>
                    </div>
        </form> 
        
</div>
</div>
{{-- <script>
    document.getElementById('name').addEventListener('input', function () {
        var input = this.value;
        // Capitalize the first letter of the name
        this.value = input.charAt(0).toUpperCase() + input.slice(1);
    });
</script> --}}

@if (session('alert'))
<script type="text/javascript">
    window.onload = function() {
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


<script>
    document.getElementById('createform').addEventListener('submit', function (e) {
    document.getElementById('btn').disabled = true; 
});
</script>

@endsection