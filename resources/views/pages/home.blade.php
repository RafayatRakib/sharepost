@extends('sharepost') 
@section('title','Home') 
@section('content')
<div class="container">
        <div class="d-block overflow-hidden">
                <div class="mt-3"><i class="fa-sharp fa-solid fa-house"></i> All Post:</div>
                <div class="mt-3 p-3 float-end" >
                        {{-- <p >post</p> --}}
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="margin-top: -4rem;"> <i class="fa-sharp fa-solid fa-circle-plus"></i>Add Post</button>
                        
                </div>
        </div>


    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div>
                        <img src="https://www.w3schools.com/howto/img_avatar.png" class="img-thumbnail rounded" style="width: 50px; hight: 25px;" alt="..." />
                    </div>
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    <div class="d-flex">
                        <p>
                            Posted by <strong><i>Rafayat </i> </strong>
                        </p>
                        <p> Time: 01:23pm</p>

                        <div class="content">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
