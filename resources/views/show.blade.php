@extends('app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-4 border-0">
                <div class="card-header bg-primary text-white text-center rounded-top-4">
                    <h3 class="mb-0">Student Details</h3>
                </div>
                <div class="card-body px-5 py-4">
                    <div class="mb-3 row">
                        <label class="col-sm-4 fw-semibold text-secondary">Name:</label>
                        <div class="col-sm-8">{{ $show->name }}</div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 fw-semibold text-secondary">E-mail:</label>
                        <div class="col-sm-8">{{ $show->email }}</div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 fw-semibold text-secondary">Mobile:</label>
                        <div class="col-sm-8">{{ $show->mobile }}</div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 fw-semibold text-secondary">Birth Date:</label>
                        <div class="col-sm-8">{{ \Carbon\Carbon::parse($show->birthdate)->format('d-m-Y') }}</div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 fw-semibold text-secondary">Username:</label>
                        <div class="col-sm-8">{{ $show->username }}</div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 fw-semibold text-secondary">Gender:</label>
                        <div class="col-sm-8">{{ $show->gender }}</div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 fw-semibold text-secondary">Country:</label>
                        <div class="col-sm-8">{{ $show->country }}</div>
                    </div>
                </div>
                <div class="card-footer bg-light text-center rounded-bottom-4">
                    <a href="{{ route('post.index') }}" class="btn btn-outline-secondary px-4">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
