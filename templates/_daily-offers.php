<?php
$daily_shuffle = $daily->getData();
?>
<?php
$category = array_map(function($pro){return $pro['category'];}, $daily_shuffle);
$unique = array_unique($category);
sort($unique);

?>

<div class="container card py-4" id="daily-offer">
        <h4 class="font-bebas font-size-20">Daily Offerse</h4>
        <div id="filters" class="button-group text-right font-poppins font-size-16">
            <button class="btn is-checked" data-filter="*">All Categories</button>
            <?php
                array_map(function ($category){
                    printf('<button class="btn" data-filter=".%s">%s</button>', $category, $category);
                }, $unique);
            ?>
        </div>

        <div class="grid">
            <?php array_map(function ($item){ ?>
            <div class="grid-item border <?php echo $item['category'] ?? "Category" ; ?>">
                <div class="item py-2" style="width: 200px;">
                    <div class="product">
                        <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/3.jpg"; ?>" alt="product1" class="img-fluid"></a>
                        <div class="text-center">
                            <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                            <div class="price py-2">
                                <span>$<?php echo $item['item_price'] ?? 0 ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }, $daily_shuffle) ?>
        </div>
    </div><br>
