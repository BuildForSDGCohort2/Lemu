<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['delete'])){
            $delete = deleteCart($_POST['item_id']);
        }
        // save for late
        if (isset($_POST['wishlist'])){
            $cart = addtoWishilist($_POST['item_id']);
        }
    }

?>
<br>
<div id="cart" class="container py-3 card">
    <div class="container-fluid w75">
        <h5 class="font-size-20 font-weight-bold">Shopping Cart</h5>

        <!-- Cart Iterms -->
        <div class="row">
            <div class="col-sm-9">

                <?php
                    foreach (getData('Cart') as $item) :
                        $cart = getProduct($item['item_id']);
                        $subTotal[] = array_map(function ($item){
                ?>
                <!-- cart item -->
                <div class="row border-top py-2 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo $item['item_image'] ?? './assets/products/1.jpg';?>" alt="pro1" width="150px" height="150px">
                    </div>
                    <div class="col-sm-8 px-5">
                        <h5 class="font-size-20"><?php echo $item['item_name'] ?? 'unknown' ;?></h5>
                        <small>by <?php echo $item['item_brand'] ?? 'brand' ;?></small>
                        <div class="qty d-flex pt-2">
                            <div class="d-flex w-25">
                                <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                                <input type="text" class="qty_input border px-2 w-50" data-id="<?php echo $item['item_id'] ?? '0';?>" disabled value="1" placeholder="1">
                                <button class="qty-down border bg-light" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><i class="fas fa-angle-down"></i></button>
                            </div>
                            <form method="post">
                            <input type="hidden" value="<?php echo $item['item_id'] ?? 0 ;?>" name="item_id">
                            <button type="submit" class="btn bg-danger px-3 border-right" name="delete">Delete</button>
                            </form>
                            <form method="post">
                            <input type="hidden" value="<?php echo $item['item_id'] ?? 0 ;?>" name="item_id">
                            <button type="submit" class="btn bg-warning" name="wishlist">Add to Watchlist</button>
                            </form>
                        </div>
                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="text-danger font-size-20">
                            $<span><?php echo $item['item_price'] ?? 0;?></span>
                        </div>
                    </div>
                </div>
                <!-- !cart item -->
                <?php
                    return $item['item_price'];
                    },$cart);
                    endforeach;
                ?>
            </div>
            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 text-success py-3"><i class="fas fa-check"></i> Your order is eligible for Delivery.</h6>
                    <div class="border-top py-4">
                        <h5 class="font-size-20">Subtotal ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? getSum($subTotal) : 0; ?></span> </span> </h5>
                        <button type="submit" class="btn btn-success mt-3" data-toggle="modal" data-target="#checkout">Checkout</button>
                    </div>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>
        <!-- Cart Iterms -->
    </div>
</div><br>