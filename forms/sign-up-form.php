<div class="container">

  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
    Create one
  </button>
  <br>
  <br>

  
    <div class="collapse collapse-horizontal" id="collapseWidthExample">
      <div class="card card-body">
        <h3>Create an account below</h3>
        <script type='text/javascript'>
          $(document).ready(function(){
            $('#sign-up-button').click(function(){
              var input = $('#sign-up-button').val();
              var name = $('#name').val();
              var email = $('#email').val();
              var password = $('#password').val();
              var confirm_password = $('#confirm_password').val();
              var email_list = $('#email_list').val();
              $.ajax({
                data:{input:input,name:name,email:email,password:password,confirm_password:confirm_password,email_list:email_list},         
                method: 'post',
                url: 'https://kingwebsites.co.za/ajax-results/sign-up.php', 
                success: function(result){
                  $('#sign-up-result').html(result);
            // $('#sign-up-form').css('display','none');
          }});
            });
          });
        </script>
        <form id="sign-up-form">
         <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text" name="name" id="name" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" id="email" class="form-control" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
          <input type="password" id="confirm_password" name="confirm_password" class="form-control">
        </div>
        <div class="mb-3 form-check">
          <label class="form-check-label" for="exampleCheck1">Join email list</label>
          <select name="email_list" id="email_list" class="form-select">
            <option value="yes">Yes</option>
            <option value="Not now">Not now</option>
          </select>
        </div>
      </form>
      <!-- Button trigger modal -->
      <button type="submit" value="input" id="sign-up-button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</button>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notice</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id='sign-up-result' class="modal-dialog modal-xl"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
</div>