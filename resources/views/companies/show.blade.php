@extends('layouts.master')
@section('title')
   Company page
@endsection
@include('partials.navbar')
@section('content')
   <div class="container">
       <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
               
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Employee</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Website</th>
                <th scope="col">Logo</th>
                <th scope="col">Address</th>
                </tr>
               </thead>
                <tbody>
                <tr>

                    <td>{{$company->company_name}}</td>
                    <td>{{$company->category_id}}</td>
                    <td>{{$company->number_of_employee}}</td>
                    <td>{{$company->phone_number}}</td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->website}}</td>
                    <td>
<img src="/storage/{{$company->company_logo}}" alt="" style="width:50px;height:50px" class="rounded-circle mb-2">
                    </td>             
                    <td>{{$company->address}}</td>
                    </tr>  
                    
                    
                
                </tbody>
          </table>
       </div>
   </div>
@endsection