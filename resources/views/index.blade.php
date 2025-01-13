<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
</head>
<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>
   
    <br>
    <a href="{{route('post.create')}}"><button class="btn btn-outline-primary">Add Student</button></a>
    <br> <br>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">E-mail</th>
        <th scope="col">Mobile</th>
        <th scope="col">Birth Date</th>
        <th scope="col">Gender</th>
        <th scope="col">Country</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($index as $list)
        <tr>
            <th scope="row">{{$list->id}}</th>
            {{-- <td>{{$list->name}}</td> --}}
            <td>{{ ucwords(strtolower($list->name)) }}</td>
            <td>{{$list->email}}</td>
            <td>{{$list->mobile}}</td>
            {{-- <td>{{$list->birthdate}}</td> --}}
            <td>{{ \Carbon\Carbon::parse($list->birthdate)->format('d-m-Y') }}</td>
            <td>{{$list->gender}}</td>
            <td>{{$list->country}}</td>
            <td>
                  {{-- Edit button --}}
               <a href="{{route('post.edit',$list->id)}}"><button type="submit" class="btn btn-outline-primary">Edit</button></a>

       {{-- Delete button --}}
               <form action="{{ route('post.destroy', $list->id) }}"  method="POST" style="display: inline;" id="deleteform">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-delete" onclick="confirmDelete(event)" id="del-btn" >Delete</button>
            </form>

  {{-- View button --}}
               <a href="{{route('post.show',$list->id)}}"><button type="submit" class="btn btn-outline-info">View</button></a>
            </td>
          </tr>
        @endforeach

    </tbody>
  </table>





  <script>
  function confirmDelete(event) {
    event.preventDefault(); // Prevent the form from submitting right away
    
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            event.target.closest('form').submit();
            Swal.fire({
           title: 'Success!',
           text: 'The item has been deleted successfully.',
           icon: 'success',
           showConfirmButton: false
       });
     
        }
      
    });
}
 </script>

 
</body>

</html>