<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleted Records</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.15/dist/sweetalert2.min.css">

<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.15/dist/sweetalert2.min.js"></script>

</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Deleted Records</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Id</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">E-mail</th>
                    <th scope="col" class="text-center">Mobile</th>
                    <th scope="col" class="text-center">Birth Date</th>
                    <th scope="col" class="text-center">Gender</th>
                    <th scope="col" class="text-center">Country</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($deletedRecords as $list)
                    <tr>
                        <th scope="row">{{ $list->id }}</th>
                        <td>{{ ucwords(strtolower($list->name)) }}</td>
                        <td>{{ $list->email }}</td>
                        <td>{{ $list->mobile }}</td>
                        <td>{{ \Carbon\Carbon::parse($list->birthdate)->format('d-m-Y') }}</td>
                        <td>{{ $list->gender }}</td>
                        <td>{{ $list->country }}</td>
                        <td>
                            <!-- Form to restore the record -->
                            <form action="{{ route('post.restore', $list->id) }}" method="POST" id="restore-form-{{ $list->id }}">
                                @csrf
                                <a href="javascript:void(0);" class="btn btn-success" onclick="confirmRestore(event,'{{ $list->id }}')">Restore</a>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No deleted records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="/post" class="btn btn-primary mt-3">Back to Home</a>
    </div>

    <script>
   function confirmRestore(event, recordId) {
    event.preventDefault();

    Swal.fire({
        title: "Are you sure?",
        text: "You want to restore this record?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, restore it!"
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('restore-form-' + recordId).submit();

            Swal.fire({
                title: 'Restored!',
                text: 'The record has been restored successfully.',
                icon: 'success',
                timer:10000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = "{{ route('post.index') }}"; 
            });
       
        }
    });
}



           
    </script>
</body>
</html>
