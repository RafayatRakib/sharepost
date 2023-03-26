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
</script>