
  <!-- Content here -->
  <script type='text/javascript'>
      $(document).ready(function(){
        $('#go_online').click(function(){
          
          var go_online = $('#go_online').val();
          $.ajax({
            data:{go_online:go_online},          
            method: 'post',
            url: 'https://kingwebsites.co.za/ajax-results/online-state.php',
            // dataType:'JSON', 
            success: function(result){
              $('#store-state').html(result);
              // $('#login-form').css('display','none');
            }});
        });
      });
    </script>

    <button type="button" class="btn btn-outline-success" id='go_online' value='Open' name="go_online" data-bs-toggle="modal" data-bs-target="#state-online">Go Online</button>

  <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="state-online" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notice</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id='store-state'class="modal-dialog modal-xl"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>