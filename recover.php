<?php require_once('includes/head.php');
        
?>


<div class="container">
    <div class="row">
        <div class="col-6 m-auto">
            <div class="form mt-5 py-2">
                <div class="title">
                    <h2 class="text-center">Recover Password</h2>
                    <?php recover_password();
                        display_message();
                    ?>
                    <br>
                </div>
                <div class="body">
                    <form method="post">
                    <input type="email" name="UEmail" placeholder="User Email" class="form-control py-2 mb-2">
                    <input type="hidden" name="token" value="<?php echo Token_Generator() ;?>">
                    
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