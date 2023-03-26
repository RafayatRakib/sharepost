@php
use Carbon\Carbon;
@endphp

<script>
      function post(){
        var post_title = $('#post_title').val();
        var post = $('#post').val();
        // alert(post_title + post);

        $.ajax({
            type: 'post',
            dataType: 'json',
            data: {
                post_title:post_title,
                post : post
            },
            url: `{{url('add/post')}}`,
            success: function(data){
            $('.modal').modal('hide');
             $('#post_title').val('');
             $('#post').val('');
             getPost();
            const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }

            }, error: function(jqXHR, textStatus, errorThrown) {
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        })

    }


    function getPost(){
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: `{{url('/get/post/data')}}`,
            success: function(data){
                console.log(data);


                var rows = '';
                 $.each(data.post, function(key, value){
                    rows+= `
                    
                    <div class="m-3">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div>
                        


                        <img src="${value.user.photo !== null ? value.user.photo : '/uploads/no_image_avatar.png'}" class="img-thumbnail rounded" style="width: 50px; height: 50px;" alt="..." />


                    </div>
                    <h5 class="card-title">${value.post_title}</h5>
                    <p class="card-text">${value.post}</p>

                    <div class="d-flex">
                        <p>
                            Posted by <strong><i> ${value.user.name} </i> </strong>
                        </p>
                        <p> Time:${moment(value.user.updated_at).format('DD-MM-yy HH:mm')}</p>

                        <div class="content">
                            @if(Auth::user())
                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updatemodal" onclick="edit(${value.id})" class="btn btn-sm btn-success" >Edit</button>
                            <button type="button" onclick="postdelete(${value.id})" class="btn btn-sm btn-danger" >Delete</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                    
                    `
                 })


                 $('#show_post').html(rows);

            }, error: function(jqXHR, textStatus, errorThrown){
                console.log("AJAX error: " + textStatus + ':' + errorThrown);
            }
        })
    }
    getPost();


    function edit(id){
        // alert(id);

        $.ajax({
            type: 'get',
            dataType: 'json',
            url: `{{url('/get/post/${id}')}}`,
            success: function(data){
                console.log(data);
                $('#eidt_post_title').val(data.post.post_title);
                $('#edit_post').val(data.post.post);
                $('#id').val(data.post.id);


            },error: function(jqXHR, textStatus, errorThrown){
                console.log("AJAX error: " + textStatus + ':' + errorThrown);
            }
        })

    }

    function updatepost(){




        $.ajax({
            type: 'post',
            dataType: 'json',
            data: {
                id : $('#id').val(),
                post_title : $('#eidt_post_title').val(),
                post : $('#edit_post').val(),
            },
            url: `{{url('/post/update')}}`,
            success: function(data){
                console.log(data);
            $('.modal').modal('hide');
                getPost();
            const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }


            },error: function(jqXHR, textStatus, errorThrown){
                console.log("AJAX error: " + textStatus + ':' + errorThrown);
            }
        })
    }

    function postdelete(id){
        // alert(id);


        Swal.fire({
        title: 'Are you sure to delete this post?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'Yes',
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: `{{url('/post/delete/${id}')}}`,
            success: function(data){
            getPost();
            const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }

            },error: function(jqXHR, textStatus, errorThrown){
                console.log("AJAX error: " + textStatus + ':' + errorThrown);
            }
        })

            
        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
        })

        
    }


</script>


<script>

    // function updateUser(){
    //     var name =  $('#name').val();
    //     var email =  $('#email').val();
    //     // var old_passoword =  $('#old_passoword').val();
    //     // var new_password =  $('#new_password').val();
    //     // var repet_password =  $('#repet_password').val();
    //     // var photo =  $('#photo').val();

    //     $.ajax({
    //         type: 'post',
    //         dataType: 'json',
    //         data:{
    //             name:name,
    //             email:email,
    //             // old_passoword: old_passoword,
    //             // new_password: new_password,
    //             // repet_password: repet_password,
    //             // photo: photo
    //         },
    //         url: `{{url('/user/update')}}`,
    //         success: function(data){
    //             console.log(data);


    //             const Toast = Swal.mixin({
    //              toast: true,
    //              position: 'top-end',
    //              icon: 'success', 
    //              showConfirmButton: false,
    //              timer: 3000 
    //        })
    //        if ($.isEmptyObject(data.error)) {
                   
    //                Toast.fire({
    //                type: 'success',
    //                title: data.success, 
    //                })
    //        }else{
              
    //       Toast.fire({
    //                type: 'error',
    //                icon: 'error',
    //                title: data.error, 
    //                })
    //            }


    //         },error: function(jqXHR, textStatus, errorThrown){
    //             console.log("AJAX error: " + textStatus + ':' + errorThrown);
    //         }

    //     })
    
    // }

</script>









<script>
    $(document).ready(function() {
      // Get a reference to the file input element
      var fileInput = $("#photo");

      // Set up an event listener to trigger when a file is selected
      fileInput.change(function() {
        // Get a reference to the preview image element
        var previewImg = $("#image");

        // Get the selected file object from the file input element
        var file = fileInput[0].files[0];

        // Create a new FileReader object
        var reader = new FileReader();

        // Set up an event listener to trigger when the file has been read
        reader.onload = function() {
          // Set the source of the preview image to the data URL of the selected file
          previewImg.attr("src", reader.result);
        };

        // Read the selected file as a data URL
        reader.readAsDataURL(file);
      });
    });
  </script>