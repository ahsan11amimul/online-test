@extends('layouts.master')
@section('title')
   Category page
@endsection
@include('partials.navbar')
@section('content')
   <div class="container">
       <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
               
                <th scope="col">Name</th>
                <th scope="col">Number Of Company</th>
               
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                </tr>
               </thead>
                <tbody>
                <tr>

                    <td>{{$category->name}}</td>
                    <td>{{$category->companies()->count()}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>{{$category->updated_at}}</td>
                    </tr>  
                    
                    
                
                </tbody>
          </table>
       </div>
   </div>
@endsection