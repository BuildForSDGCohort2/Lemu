<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['delete'])){
            $delete = deleteWishlist($_POST['item_id']);
        }
        // add to cart
        if (isset($_POST['add'])){
            $cart->addtoWishilist($_POST['item_id'], 'Cart', 'Wishlist');
        }
    }

?>
<br>
<div id="cart" class="container py-3 card">
    <div class="container-fluid w75">
        <h5 class="font-size-20 font-weight-bold">Wishlist</h5>

        <!-- Cart Iterms -->
        <div class="row">
            <div class="col-sm-9">

                <?php
                    foreach (getData('Wishlist') as $item) :
                        $cart = getProduct($item['item_id']);
                        $subTotal[] = array_map(function($item){
                ?>
                <!-- cart item -->
                <div class="row border-top py-1 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo $item['item_image'] ?? './assets/products/1.jpg';?>" alt="pro1" width="150px" height="150px">
                    </div>
                    <div class="col-sm-8 px-5">
                        <h5 class="font-size-20"><?php echo $item['item_name'] ?? 'unknown' ;?></h5>
                        <small>by <?php echo $item['item_brand'] ?? 'brand' ;?></small>
                        <div class="qty d-flex pt-2">
                            <form method="post">
                            <input type="hidden" value="<?php echo $item['item_id'] ?? 0 ;?>" name="item_id">
                            <button type="submit" class="btn bg-danger border-right" name="delete">Delete</button>
                            <button type="submit"  name="add" class="btn bg-warning">Add to Cart</button>
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
        </div>
        <!-- Cart Iterms -->
    </div>
</div><br>