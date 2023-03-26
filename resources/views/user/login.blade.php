
@extends('sharepost')
@section('content')
@section('title','Login')

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

            <div class="card mt-3">
                <div class="card-title"><h3 class="p-2">Input Your Credentials to Login</h3></div>
                <div class="card-body">
                    <form id="user-add" action="{{route('login')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-group">
                          <label for="email">Email address:</label>
                          <input type="email" name="email" class="form-control " id="email" value="{{old('email')}}" placeholder="Enter email" >
                            
                        </div>
                        <div class="form-group">
                          <label for="password">Password:</label>
                          <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" >
                        </div>
            
                        <button type="submit" class="btn btn-success mt-2">Login</button>
                    </form>
                </div>
            </div>
        

        </div>
    </div>
    </div>

@endsection