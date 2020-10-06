<?php require_once('includes/head.php') ?>


         <div class="container">
            <div class="row">
                <div class="col-6 m-auto">
                    <div class=" form mt-5 py-2">
                        <?php 
                        display_message();
                        login_validation();
                        ;?>
                        <div class="title">
                            <h2 class="text-center ">Login to Lemu</h2>
                            <br>
                        </div>
                        <div class="body">
                        <form method="post">
                            <input type="text" name="UEmail" placeholder="Username" class="form-control py-2 mb-2">
                            <input type="password" name="pass" placeholder="Password" class="form-control py-2 mb-2">
                            <input type="checkbox" name="remeber" class="float-left"><span class="float-left px-1">Remember Me</span>
                            <button class="btn btn-dark float-right">Login</button><br>
                        
                        </div>
                        <div class="card-footer">
                            
                            <a href="recover.php" class="float-left text-white"> Forgot Password</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         </div>
                
<?php require_once('includes/foot.php') ?>