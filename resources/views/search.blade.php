@extends('layouts.master')
@section('title')
   Search page
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
       <div class="row p-3">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Website</th>
                <th scope="col">Comapny Logo</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                
                </tr>
               </thead>
                <tbody>
                    @foreach ($companies as $item)
                    <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td><a href="/companies/{{$item->id}}">{{$item->company_name}}</a></td>
                    <td>{{$item->category->name??''}}</td>
                    <td>{{$item->website}}</td>
                    <td>
                    <a href="/companies/{{$item->id}}">
                        <img src="/storage/{{$item->company_logo}}" alt="" style="width:100px;height:100px" class="rounded-circle mb-2">
                    </a>
                    </td>
                    <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                    <td>{{date('d-m-Y', strtotime($item->updated_at))}}</td>
                    </tr>  
                    @endforeach
                    
                
                </tbody>
          </table>
       </div>
   </div>
@endsection