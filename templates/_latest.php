<!-- Latest -->
<?php
$check = getDataL();
?>

<div id="latest" class="container py-4 card">
  <h4 class="font-bebas font-size-20">Latest</h4>
    <hr>
    <!-- owl carousel -->
      <div class="owl-carousel owl-theme">
      <?php foreach ($check as $item) {?>
        <div class="item py-2">
          <div class="product font-poppins" >
          <a href="<?php printf('%s?item_id=%s', 'products.php',  $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "assets/products/2.jpg";?>" alt="product1" class="img-fluid"></a>
            <div class="text-center">
              <h6><?php echo $item['item_name'] ?? "Unknown";?></h6>
              <div class="price py-2">
                <span>$<?php echo $item['item_price'] ?? 0;?></span>
              </div>
            </div>
          </div>
        </div>
      <?php }?>
      </div>
</div><br>
<!-- Latest -->