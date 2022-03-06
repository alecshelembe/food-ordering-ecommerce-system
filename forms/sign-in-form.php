<?php 
    if(isset($_COOKIE['Email']) && isset($_COOKIE['Key'])) {
  
  $email = $_COOKIE['Email'];
  $key = $_COOKIE['Key']; 

} else {
  $email = '';
  $key = '';
 
}
 ?>
<div class="container">
  <h3>Sign in</h3>
  <!-- Content here -->
  <script type='text/javascript'>
      $(document).ready(function(){
        $('#login-button').click(function(){
          var signIn = $('#login-button').val();
          var email = $('#s_email').val();
          var password = $('#s_password').val();
          $.ajax({
            data:{signIn:signIn,email:email,password:password},          
            method: 'post',
            url: 'https://kingwebsites.co.za/ajax-results/sign-in.php',
            // dataType:'JSON', 
            success: function(result){
              $('#login-result').html(result);
              // $('#login-form').css('display','none');
            }});
        });
      });
    </script>
  <form>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" name="email" value="<?php echo("$email"); ?>" id='s_email' aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" id='s_password' name="password" value="<?php echo("$key"); ?>" class="form-control">
    </div>
  </form>
    <button type="submit" class="btn btn-primary" id='login-button' value='signIn' name="signIn" data-bs-toggle="modal" data-bs-target="#exampleModal2">Submit</button>
  <p>Don't have an account?</p>

  <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notice</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id='login-result'class="modal-dialog modal-xl"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/forms/sign-up-form.php");?>