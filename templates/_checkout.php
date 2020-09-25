<div class="container">

  <!-- The Modal -->
  <div class="modal" id="checkout">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
            <h3 class="modal-title">Checkout</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="post">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-7">
                                <h5>Billing Address</h5>
                                <input type="text" name="Fullname" placeholder="Full Name" class="form-control py-2 mb-2">
                                <input type="email" name="Email" placeholder="Email" class="form-control py-2 mb-2">
                                <input type="text" name="Address" placeholder="Address" class="form-control py-2 mb-2">
                                <input type="text" name="City" placeholder="City" class="form-control py-2 mb-2">
                                <input type="text" name="Province" placeholder="Province" class="form-control py-2 mb-2">
                                <input type="text" name="Location" placeholder="Location" class="form-control py-2 mb-2">
                                <button type="button" class="btn btn-success form-control"> Proceed to Buy </button>
                            </div>
                            <div class="col-sm-4">
                                <div class="container">
                                <h5>Cart</h5>
                                <?php
                                foreach (getData('Cart') as $item) :
                                    $cart = getProduct($item['item_id']);
                                    $subTotal[] = array_map(function ($item){
                                ?>
                                <div class="row border-top">
                                    <div class="col-sm-2 ">
                                    <p><?php echo $item['item_name'] ?? 'unknown' ;?></p>
                                    </div>
                                    <div class="col-sm-2 ml-auto">
                                        $<span class="price"><?php echo $item['item_price'] ?? 0;?></span>
                                    </div>
                                </div>
                                <?php
                                return $item['item_price'];
                                },$cart);
                                endforeach;
                                ?>
                                
                                 <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                    <h5>Total</h5>
                                    </div>
                                    <div class="col-sm-2 ml-auto">
                                    $<span class="price"><?php echo isset($subTotal) ? getSum($subTotal) : 0; ?></span>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
  
</div>