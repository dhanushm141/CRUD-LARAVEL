<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>

    <!-- Bootstrap & SweetAlert -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .header-actions .btn {
            min-width: 140px;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .card {
            border-radius: 1rem;
        }
    </style>
</head>

<body>
<div class="container my-5">
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-primary">Student List</h3>
                <div class="header-actions d-flex gap-2">
                    <a href="{{ route('post.create') }}" class="btn btn-primary">Add Student</a>
                    <a href="{{ route('deleted.records') }}" class="btn btn-danger">Deleted Records</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-primary text-center">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Mobile</th>
                        <th>Birth Date</th>
                        <th>Gender</th>
                        <th>Country</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($index as $list)
                        <tr class="text-center">
                            <td>{{ $list->id }}</td>
                            <td>{{ ucwords(strtolower($list->name)) }}</td>
                            <td>{{ $list->email }}</td>
                            <td>{{ $list->mobile }}</td>
                            <td>{{ \Carbon\Carbon::parse($list->birthdate)->format('d-m-Y') }}</td>
                            <td>{{ $list->gender }}</td>
                            <td>{{ $list->country }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('post.show', $list->id) }}" class="btn btn-outline-info btn-sm">View</a>&nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('post.edit', $list->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>&nbsp;&nbsp;&nbsp;
                                    <form action="{{ route('post.destroy', $list->id) }}" method="POST" style="display: inline;" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm btn-delete" onclick="confirmDelete(event)">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="8" class="text-muted">No students found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- SweetAlert Delete Confirmation -->
<script>
    function confirmDelete(event) {
        event.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "This student record will be deleted permanently.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#198754",
            cancelButtonColor: "#dc3545",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.closest('form').submit();
            }
        });
    }
</script>
</body>
</html>
