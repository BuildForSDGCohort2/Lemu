<?php require_once('includes/head.php') ?>



         <div class="container">
            <div class="row">
                <div class="col-6 m-auto">
                    <div class="card bg-light mt-5 py-2">
                        <div class="card-title">  
                            <h2 class="text-center">Reset Password</h2>
                            <br>
                            <?php
                                reset_password();
                                display_message();
                            ?>
                        </div>
                        <div class="card-body">
                            <form method="post">
                            <input type="password" name="reset-pass" placeholder="Password" class="form-control py-2 mb-2">
                            <input type="password" name="reset-c-pass" placeholder="Confirm Password" class="form-control py-2 mb-2">
                            <input type="hidden" name="token" value="<?php echo Token_Generator();?>">
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-danger float-right">Cancel</button>
                            <button class="btn btn-success float-left">Send Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         </div>
                
<?php require_once('includes/foot.php') ?>