<div class="container">

  <!-- The Modal -->
  <div class="modal" id="sign-up">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-center">Sign-Up on Lemu</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <?php user_validation(); ?>
          <form action="" method="post">
          <input type="text" name="Firstname" placeholder="First Name" class="form-control py-2 mb-2">
          <input type="text" name="Lastname" placeholder="Last Name" class="form-control py-2 mb-2">
          <input type="text" name="Username" placeholder="User Name" class="form-control py-2 mb-2">
          <input type="email" name="Email" placeholder="Email" class="form-control py-2 mb-2">
          <input type="password" name="pass" placeholder="Password" class="form-control py-2 mb-2">
          <input type="password" name="cpass" placeholder="Confirm Password" class="form-control py-2 mb-2">

          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        	<button type="button" class="btn btn-success float-right"> Sign-up Here </button>
          </form>
        </div>
        
      </div>
    </div>
  </div>
  
</div>