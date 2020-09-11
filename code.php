<?php require_once('includes/head.php') ?>


         <div class="container">
            <div class="row">
                <div class="col-6 m-auto">
                    <div class="form mt-5 py-2">
                        <div class="card-title">  
                            <h2 class="text-center">Enter Code</h2>
                            <br>
                            <?php validation_code() ;?>
                        </div>
                        <div class="body">
                            <form method="post">
                            <input type="text" name="recover-code" placeholder="######" class="form-control py-2 mb-2">
                        </div>
                        <div class="footer">
                            <button class="btn btn-danger float-left">Cancel</button>
                            <button class="btn btn-success float-right">Send Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         </div>
                
<?php require_once('includes/foot.php') ?>