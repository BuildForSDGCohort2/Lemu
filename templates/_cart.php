<div id="cart" class="container py-3">
    <div class="container-fluid w75">
        <h5 class="font-size-20">Shopping Cart</h5>

        <!-- Cart Iterms -->
        <div class="row">
            <div class="col-sm-9">
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="assests/products/1.jpg" alt="pro1" width="150px" height="150px">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-size-20">Samung Galaxy</h5>
                        <small>by Samsung</small>
                        <div class="qty d-flex pt-2">
                            <div class="d-flex w-25">
                                <button class="qty-up border bg-light" data-id="pro"><i class="fas fa-angle-up"></i></button>
                                <input type="text" class="qty_input border px-2 w-50" data-id="pro" disabled value="1" placeholder="1">
                                <button class="qty-down border bg-light" data-id="pro"><i class="fas fa-angle-down"></i></button>
                            </div>
                            <button type="submit" class="btn bg-danger px-3 border-right">Delete</button>
                            <button type="submit" class="btn bg-warning">Add to Watchlist</button>
                        </div>
                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="text-danger font-size-20">
                            $<span>20</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 text-success py-3"><i class="fas fa-check"></i> Your order is eligible for Delivery.</h6>
                    <div class="border-top py-4">
                        <h5 class="font-size-20">Subtotal (1 item):&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price">20.00</span> </span> </h5>
                        <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                    </div>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>
        <!-- Cart Iterms -->
    </div>
</div><br>