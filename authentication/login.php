<div class="container">
<!-- The Modal -->
  <div class="modal" id="login">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-center">Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <?php 
          display_message();
          login_validation();
          ;?>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form method="post">
          <input type="text" name="UEmail" placeholder="Username" class="form-control py-2 mb-2">
          <input type="password" name="pass" placeholder="Password" class="form-control py-2 mb-2">
          <button class="btn btn-dark float-right">Login</button>
            
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <input type="checkbox" name="remember"> <span class="mr-auto"> Remember Me </span>
            <a href="#" data-toggle="modal" data-target="#recover"> Forgot Password</a>
            </form>
        </div>
        
      </div>
    </div>
  </div>
  
</div>