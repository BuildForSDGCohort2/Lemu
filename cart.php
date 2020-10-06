<?php include('includes/header.php');?>

<?php

    // product
    count(getData('Cart')) ? include('templates/_cart.php') : include('templates/notfound/_empty_cart.php');
    ;
    // product

    // wishlist
    count(getData('Wishlist')) ? include('templates/wishlist.php') : include('templates/notfound/_empty_wishlist.php');
    // wishlist

    // Popular Categories
    include('templates/_latest.php');
    // Popular Categories
?>

<?php include('includes/footer.php')?>