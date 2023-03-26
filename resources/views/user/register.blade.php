
@extends('sharepost')
@section('content')
@section('title','Register')


     <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

            
        <div class="card">
            <div class="card-body">
            <h3 class="title">Input Your Credentials to register</h3>

                <form id="user-add" action="{{route('register')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group">
                      <label for="name">Name:</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name')}}" placeholder="Enter name" >
                      @error('name')<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                      <label for="email">Email address:</label>
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email')}}" placeholder="Enter email" >
                      @error('email')<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>@enderror
                        
                    </div>
                    <div class="form-group">
                      <label for="password">Password:</label>
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter password" >
                      @error('password')<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>@enderror
                        
                    </div>
                    <div class="form-group">
                        <label for="password">Password Conformation:</label>
                        <input type="password" name="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Enter password" >
                      @error('password_confirmation')<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>@enderror
                        
                    </div>
                    <div class="form-group">
                      <label for="password">Phone Number:</label>
                      <input type="number" name="phone_number" class="form-control  @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Enter phone" >
                    @error('phone_number')<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>@enderror
                      
                  </div>
                    <div class="form-group">
                      <label for="address">Address:</label>
                      <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address" rows="3" placeholder="Enter address" >{{old('address')}}</textarea>
                      @error('address')<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>@enderror
                        
                    </div>

                    {{-- <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                      @error('image')<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>@enderror

                      </div> --}}
                    <button type="submit" class="btn btn-success mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
        </div>



        <script>
            if ($("#user-add").length > 0) {
            $("#user-add").validate({
            rules: {
            name: {
            required: true,
            maxlength: 50
            },
            email: {
            required: true,
            },
            password: {
            required: true,
            },
            address: {
            required: true,
            },
            },
            messages: {
            name: {
            required: "Please enter name",
            },
            email: {
            required: "Please enter valid email",
            },
            password: {
            required: "Please enter password",
            },
            address: {
            required: "Please enter address",
            },
            },
            })
            } 
            </script>

    @endsection