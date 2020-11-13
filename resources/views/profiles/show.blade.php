@extends('layouts.master')
@section('title','Profile Page')
    

@section('content')
@include('partials.navbar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 m-3">
        <h2 class="text-center text-muted">Profile page for {{$user->name}}</h2>
        <hr>
        </div>
        <div class="col-md-4">
        <img src="/storage/{{$user->profile->profile_image??''}}" alt="" style="width: 250px;height:150px;" class="rounded-circle">
        </div>
        <div class="col-md-3">
            <div>
            <p> <strong>Username: </strong>{{$user->username}}</p>
            </div>
            <div>
            <p> <strong>Email:   </strong>{{$user->email}}</p>
            </div>
            <div>
            <p><strong>BirthDay:  </strong>{{date('d-m-Y',strtotime($user->dob))}}</p>
            </div>
        </div>
        <div class="col-md-5">
        <a href="/profile/{{$user->profile->user_id}}/edit">Edit your Profile</a>
        </div>
       {{-- <div class="col-md-2">
       <h6>{{$user->username}}</h6>
       </div>
       <div class="col-md-2">
       <h6>{{$user->email}}</h6>
       </div>
       <div class="col-md-4">
       <p>{{date('d-m-Y',strtotime($user->dob))}}</p>
       </div>
       <div class="col-md-4">
       <img src="{{asset('/storage/uploads/'.$user->profile->profile_image)}}" alt="">
       </div> --}}
    </div>
</div>
@endsection

