@extends('sharepost')
@section('title','Dashboard')
    
@section('content')
<!-- HTML code -->

<div class="d-flex">
<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link active" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          Dashboard
        </a>
      </li>
      <li class="nav-item mt-3">
        <form action="{{route('logout')}}" method="post">
          @csrf
          
            <button class="dropdown-item" ><i class="fa-sharp fa-solid fa-arrow-right"></i> Logout</button>
          </form>
      </li>
    </ul>
    <hr>
  </div>
  
  <div class="m-3">
    <div class="card">
        <div class="card-body">
          <form id="update-form" action="{{route('user_update')}}" method="post" enctype="multipart/form-data">
            {{-- <form id="update-form"> --}}
            @csrf
            <div class="input-group flex-nowrap p-2">
                <span class="input-group-text" id="addon-wrapping">Name:</span>
                <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Name" required >
              </div>

              <div class="input-group flex-nowrap p-2">
                <span class="input-group-text" id="addon-wrapping">Email:</span>
                <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Email"required >
              </div>


              {{-- <div class="input-group flex-nowrap p-2">
                <span class="input-group-text" id="addon-wrapping">Old Password:</span>
                <input type="password" class="form-control" name="old_passoword" id="old_passoword" placeholder="Old Password" >
              </div>
              <div class="input-group flex-nowrap p-2">
                <span class="input-group-text" id="addon-wrapping">New Password:</span>
                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" >
              </div>
              <div class="input-group flex-nowrap p-2">
                <span class="input-group-text" id="addon-wrapping">Repet New Password:</span>
                <input type="password" class="form-control" name="repet_password" id="repet_password" placeholder="Repet New Password" >
              </div> --}}
              <div class="input-group flex-nowrap p-2">
                <input type="file" id="photo" name="photo" class="form-control"  >
              </div>

              
              <div class="input-group flex-nowrap p-2">
                <img style="width: 80px; hight:45px" name="image"  id="image" src="{{$user->photo!=NULL ? asset($user->photo) : asset('/uploads/no_image_avatar.png')}}" class="img-fluid" alt="...">
              </div>
              {{-- <input type="submit" class="btn btn-danger" onclick="updateUser()" value="Update"> --}}
              <input type="submit" class="btn btn-danger"  value="Update">
            </form>
        </div>
    </div>
  </div>


</div>


@endsection