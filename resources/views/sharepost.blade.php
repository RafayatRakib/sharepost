<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- iconic cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    {{-- sweet alert --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>@yield('title') </title>
  </head>
  <body>
    @include('src.navbar')
    @include('src.modal')

    @yield('content')



    <!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/7.1.0/esm/ionicons.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>



<script>
  $(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
  })
</script>
{{-- <script>
  $(document).ready(function() {
    $('#update-form').validate({
      rules: {
        name: 'required',
        email: {
          required: true,
          email: true
        },
        old_password: {
          minlength: 6
        },
        new_password: {
          minlength: 6
        },
        repet_password: {
          minlength: 6,
          equalTo: '#new_password'
        },
        photo: {
          accept: 'image/*'
        }
      },
      messages: {
        name: 'Please enter your name',
        email: {
          required: 'Please enter your email',
          email: 'Please enter a valid email address'
        },
        old_password: {
          minlength: 'Password should be at least 6 characters'
        },
        new_password: {
          minlength: 'Password should be at least 6 characters'
        },
        repet_password: {
          minlength: 'Password should be at least 6 characters',
          equalTo: 'Passwords do not match'
        },
        photo: {
          accept: 'Please upload a valid image file'
        }
      }
    });
  });
</script> --}}

  @include('src.js')
  <script>
    alert('Hello');
  </script>
  </body>
</html>