<?php require_once('includes/head.php') ?>


         <div class="container">
            <div class="row">
                <div class="col-6 m-auto">
                    <div class="form mt-5 py-2">
                    <p class="text-center"></p>
                        <div class="title">
                            <h2 class="text-center">Sign-up on Lemu</h2>
                            <br>
                        </div>
                        <div class="body">
                            <?php user_validation(); ?>
                            <form action="" method="post">
                            <input type="text" name="Firstname" placeholder="First Name" class="form-control py-2 mb-2">
                            <input type="text" name="Lastname" placeholder="Last Name" class="form-control py-2 mb-2">
                            <input type="text" name="Username" placeholder="User Name" class="form-control py-2 mb-2">
                            <input type="email" name="Email" placeholder="Email" class="form-control py-2 mb-2">
                            <input type="password" name="pass" placeholder="Password" class="form-control py-2 mb-2">
                            <input type="password" name="cpass" placeholder="Confirm Password" class="form-control py-2 mb-2">
                            <button class="btn btn-success float-left">Sign-up Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         </div>
                
 <?php require_once('includes/foot.php') ?>