<!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Post title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Post Title</label>
                <input type="email" class="form-control" id="post_title" placeholder="Enter post title" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Post</label>
                <br>
                <textarea class="form-control" name="post" id="post" cols="40" placeholder="Write post here" required ></textarea>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit"  class="btn btn-success" onclick="post()">Post</button>
        </div>
      </div>
    </div>
  </div>