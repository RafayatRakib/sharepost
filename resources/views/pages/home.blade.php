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
 <div id="show_post">

</div>
</div>
@endsection
