@extends('app')

@section('content')

{{-- <h1>
     {{$show->name}}
</h1> --}}

<div class='row'>
    <div class='col-md-6 offset-md-3 border rounded p-4 mt-2 shadow'>

    <div class="mb-3">
   <center>     <table>
            <tr>
               <td><h3><label for="">Name:</label> </td>  
                <td><h3>{{$show->name}}</h2></td>
            </tr>
            <tr>
                <td><h3><label for="">E-mail:</label></td> 
                <td><h3>{{$show->email}}</td>
            </tr>
            <tr>
                <td><h3><label for="">Mobile:</label></td> 
                <td><h3>{{$show->mobile}}</td>
            </tr>
            <tr>
                <td><h3><label for="">Birth Date:</label></td> 
                <td><h3>{{\Carbon\Carbon::parse($show->birthdate)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td><h3><label for="">Username:</label></td> 
                <td><h3>{{$show->username}}</td>
            </tr>
            <tr>
                <td><h3><label for="">Gender:</label></td> 
                <td><h3>{{$show->gender}}</td>
            </tr>
            <tr>
                <td><h3><label for="">Country:</label></td> 
                <td><h3>{{$show->country}}</td>
            </tr>
        </table></center>
<br><br>
      <center> <a href="/post"><button class="btn btn-outline-danger">Close</button></a></center> 
    </div>
    
@endsection