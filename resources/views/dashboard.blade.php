@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@include('partials.navbar')
@section('content')
<h2>Welcome {{auth()->user()->username}} to your dashboard</h2>
 @can('update', auth()->user()->profile)
             <a href="/profile/{{auth()->user()->profile->user_id}}/edit">
                 Edit Profile
             </a>    
 @endcan  
@endsection