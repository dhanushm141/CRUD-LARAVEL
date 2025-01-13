@extends('app')
@section('content')
<div class='row'>
    <div class='col-md-6 offset-md-3 border rounded p-4 mt-2 shadow'>
        <center><h1>Update Form</h1></center>
        <form action="/post/{{$edit->id}}}" method="POST">

               <input type="hidden" name="_token" value='{{csrf_token()}}'>
               <input type="hidden" name="_method" value="PUT">

            <div class="mb-3">
                <label for="" class="form-label">Student Name</label>
                <input type="text" name="name" class="form-control" value="{{$edit->name}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Student E-mail</label>
                <input type="text" name="email" class="form-control"  value="{{$edit->email}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Student Mobile</label>
                <input type="tel" name="mobile" class="form-control" maxlength="10" minlength="10" value="{{$edit->mobile}}">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Student Birth Date</label>
                <input type="date" class="form-control" name="birthdate" value="{{$edit->birthdate}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Student username</label>
                <input type="text" name="username" class="form-control" id="" value="{{$edit->username}}">
            </div>

          @if($edit->password === null)
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter new password" >
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
        @endif
            <div class="mb-3 d-flex grid gap-3 ">
                <label for="" class="form-label">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Male" {{ $edit->gender == 'Male' ? 'checked' : '' }} >
                    <label class="form-check-label" for="flexRadioDefault1">
                    Male
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Female" {{ $edit->gender == 'Female' ? 'checked' : '' }} >
                    <label class="form-check-label" for="flexRadioDefault2">
                     Female
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Not Mentioned" {{ $edit->gender == 'Not Mentioned' ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexRadioDefault2">
                      Prefer Not to Say
                    </label>
                  </div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Country</label>
                <select class="form-select" aria-label="Default select example" name="country">
                    <option selected >Select</option>
                    <option value="India" {{ $edit->country == 'India' ? 'selected' : ''}}>India</option>
                    <option value="SriLanka"  {{ $edit->country == 'SriLanka' ? 'selected' : ''}}>SriLanka</option>
                    <option value="Others"  {{ $edit->country == 'Others' ? 'selected' : ''}}>Others</option>
                  </select>
            </div>
        
            <div class="d-flex justify-content-center grid gap-0 column-gap-3">
                             <button class="btn btn-success">Submit</button>
                             {{-- <button class="btn btn-danger">Cancel</button> --}}
                             <a href="{{ route('post.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
        </form>
</div>
</div>


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