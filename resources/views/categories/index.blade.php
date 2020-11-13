@extends('layouts.master')
@section('title')
   Category page
@endsection
@include('partials.navbar')
@section('content')
   <div class="container">
       @if (Session::has('success'))
             <div class="alert alert-warning alert-dismissible fade show" role="alert">
             <strong>{{Session('success')}}!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>  
@endif
       <div class="row">
           <div class="col-md-12 m-3 text-center">
 <a href="/categories/create">Add  New Category</a>
           </div>
       
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Number Of Companies</th>

                <th scope="col">Edit Action</th>
                <th scope="col">Delete Action</th>
                </tr>
               </thead>
                <tbody>
                    @foreach ($categories as $item)
                    <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->companies()->count()}}</td>
                    <td>
                    <a href="/categories/{{$item->id}}/edit" class="btn btn-success">Edit</a>
                    </td>
                    <td>
                    <form action="categories/{{$item->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    
                    </td>
                    </tr>  
                    @endforeach
                    
                
                </tbody>
          </table>
       </div>
   </div>
@endsection