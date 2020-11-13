<div class="container-fluid">

<nav class="navbar navbar-expand-lg navbar-light bg-light"> 
  <div class="container">
  <a class="navbar-brand" href="/dashboard">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
   
    @guest
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>  
    <form  action="{{route('search')}}" method="GET" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search"  id="query" name="query" value="{{request()->input('query')}}">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
     <ul class="navbar-nav ml-auto">
      <li class="nav-item">
      <a class="nav-link" href="{{url('/register')}}">Register</a>
      </li>
     <li class="nav-item">
     <a class="nav-link" href="{{url('/login')}}">Login</a>
     </li>
    </ul>
    @endguest
    @auth
    <ul class="navbar-nav mr-auto">
     <li class="nav-item">
        <a class="nav-link" href="/categories">Categories</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="/companies">Company List</a>
      </li>
       <li class="nav-item">
       <a class="nav-link" href="/profile/{{auth()->user()->id}}">Profile</a>
      </li>
    </ul> 
   @endauth  
   @auth 
    <form  action="{{route('search')}}" method="GET" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search"  id="query" name="query" value="{{request()->input('query')}}">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
      <a class="nav-link" href="{{url('/logout')}}">Logout</a>
      </li>
    
    </ul> 
    @endauth
   
    

   
  </div>
</nav> 
  </div>
  
</div>
