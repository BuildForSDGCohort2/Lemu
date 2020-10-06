<!-- Products -->
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $cart->addToCart($_POST['user_id'],$_POST['item_id']);
        // wishlist
        if (isset($_POST['wishlist'])){
            $cart->addtoWishilist($_POST['item_id']);
        }
    }
    $item_id = $_GET['item_id'] ?? 1;
    foreach (getData() as $item) :
        if ($item['item_id'] == $item_id) :
?>
<div id="products" class="container card py-1">
    <div class="row container justify-content-center">
        <div class="col-sm-5">
        <img src="<?php echo $item['item_image'] ?? "assets/products/1.png";?>" alt="product1" class="img-fluid" style="height: 400px; width: 300px;">
                <div class="form-row pt-4 font-size-16 font-poppins">
                    <div class="col">
                    <form method="post">
                        
                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 1;?>">
                        <input type="hidden" name="user_id" value="<?php echo 1;?>">
                        <?php
                            if(in_array($item['item_id'], getWishlistid(getData('Wishlist')) ?? [])){
                                echo '<button type="submit" disabled class="btn btn-success form-control">In wishlist</button>';
                            }else{
                                echo '<button type="submit" name="wishlist" class="btn btn-warning form-control">Add to Wishlist</button>';
                            }
                        ;?>
                        </form>
                    </div>
                    <div class="col">
                        <form method="post">
                        
                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 1;?>">
                        <input type="hidden" name="user_id" value="<?php echo 1;?>">
                        <?php
                            if(in_array($item['item_id'], getCartid(getData('Cart')) ?? [])){
                                echo '<button type="submit" disabled class="btn btn-success form-control">In the cart</button>';
                            }else{
                                echo '<button type="submit" name="submit" class="btn btn-warning form-control">Add to cart</button>';
                            }
                        ;?>
                        </form>
                    </div>
                </div>
        </div>
        <div class="col-sm-4 py-3">
        <h5 class="font-poppins font-size-20 font-weight-bold"><?php echo $item['item_name'] ?? "Unknown";?></h5>
        <small>by <?php echo $item['item_brand'] ?? "Unknown";?></small>
        <hr class="m-0">

        <!-- price -->
        <table class="my-3">
            <tr class="font-poppins font-size-14">
                <td>Was </td>
                <td><strike>$50</strike></td>
            </tr>
            <tr class="font-poppins font-size-14">
                <td>Price </td>
                <td class="font-size-16 text-danger">$<span><?php echo $item['item_price'] ?? 0;?></span><small class="text-dark font-size-12">&nbsp;&nbsp;VAT inclusive</small></td>
            </tr>
            <tr class="font-poppins font-size-14">
                <td>Save </td>
                <td><span class="font-size-12 text-danger">$30</span></td>
            </tr>
        </table>
        <!-- price -->

        <!-- Policy -->
        <div id="policy">
            <div class="d-flex">
                <div class="return text-center">
                    <div class="font-size-20 color-secondary">
                        <span class="fas fa-retweet border rounded-pill"></span>
                    </div>
                    <a href="#" class="font-poppins font-size-12"> 7 days <br> Return</a>
                </div>
                <div class="delivery text-center px-5">
                    <div class="font-size-20 color-secondary">
                        <span class="fas fa-truck border rounded-pill"></span>
                    </div>
                    <a href="#" class="font-poppins font-size-12">Delivered</a>
                </div>
                <div class="warranty text-center">
                    <div class="font-size-20 color-secondary">
                        <span class="fas fa-check-double border rounded-pill"></span>
                    </div>
                    <a href="#" class="font-poppins font-size-12">1 year <br> warranty</a>
                </div>
            </div>
        </div>
        <hr>
        <!-- Policy -->
        <!-- Order Details -->
        <div id="order-details" class="font-poppins d-flex flex-column text-dark">
            <small>Delivered by: Sept 5-7 </small>
            <small> Sold by <a href="#">McMusonda</a></small>
            <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to customer</small>
        </div>
        <!-- Order Details -->

        <div class="row">
            <div class="col-6">
                <!-- Color -->
                <div class="color my-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="">Color</h6>
                        <div class="p-2 color-third-bg rounded-circle"><button class="btn font-size-14"></button></div>
                        <div class="p-2 color-third-bg rounded-circle"><button class="btn font-size-14"></button></div>
                        <div class="p-2 color-third-bg rounded-circle"><button class="btn font-size-14"></button></div>
                        <div class="p-2 color-third-bg rounded-circle"><button class="btn font-size-14"></button></div>
                    </div>
                </div>
                <!-- Color -->
            </div>
        </div>
        </div>
    </div>
    <!-- Product Details -->
    <div class="py-5">
        <hr>
        <h4 class="font-weight-bold">Product Details</h4>
        <p><?php echo $item['item_description'] ?? welcome;?></p>
    </div>
    <!-- Product Details -->
</div><br>
<!-- Products -->
<?php
        endif;
        endforeach;
?>