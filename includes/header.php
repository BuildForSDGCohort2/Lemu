<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css">


    <?php require('includes/functions.php');
    require('functions/config.php');?>
    <title>Lemu Online Store</title>
</head>
<body>

    <!-- header section -->
    <header id="header" >
        <div class="strip d-flex justify-content-between px-5 py-1 bg-light navbar-expand-md">
          <?php
          if(isset($_SESSION['Username']) || isset($_COOKIE['email'])){
          ?>
            <p class="text-black-50 m-0">Welcome, <?php echo $_SESSION['Username'];?></p>
          <?php
          }
          else
          {
          ?>

            <p class="text-black-50 m-0">Hi there, new to Lemu
            <a href="#" class="px-3 boder-right boarder-left text-dark"  data-toggle="modal" data-target="#sign-up">Sign Up </a> or 
            <a href="#" class="px-3 boder-right boarder-left text-dark" data-toggle="modal" data-target="#login">Login</a></p>
          <?php
          }
          ?>
            
                <form class="font-size-14 font-poppins">
                    <a class="py-2 rounded-pill bg-warning" href="cart.php">
                        <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                        <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count(getData('Cart'));?></span>
                    </a>
                </form>
        </div>
        <!-- Navbar Section -->
        <div class="container" id="nav">
          <nav class="navbar navbar-expand-sm color-fourth-bg navbar-light">
            <a class="navbar-brand" href="index.php">Lemu<i class="fa fa-cart-plus"></i></a>
            <div class="container justify-content-center">
              <div class="boxContainer">
                <table class="elementContainer">
                    <tr>
                        <td>
                            <input type="text" name="" placeholder=" Search products, brands and categories" class="search">
                        </td>
                        <td>
                            <a href="#"><i class="fas fa-search text-dark"></i></a>
                        </td>
                    </tr>
                </table>
              </div>
            </div>
            
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <div class="dropdown">
                  <a class="nav-link text-dark" href="#">Categories</a>
                  <div class="dropdown-content">
                    <a href="#"><i class="fas fa-baby"></i> Baby</a>
                    <a href="#"><i class="fas fa-book"></i> Books</a>
                    <a href="#"><i class="fas fa-laptop-code"></i> Computing</a>
                    <a href="#"><i class="fas fa-tv"></i>  Electronics</a>
                    <a href="#"><i class="fas fa-tshirt"></i> Fashion</a>
                    <a href="#"><i class="fas fa-heartbeat"></i> Health & Beauty</a>
                    <a href="#"><i class="fas fa-home"></i> Home & Office</a>
                    <a href="#"><i class="fas fa-mobile-alt"></i> Smart Phone & Tablets</a>
                    <a href="#"><i class="fas fa-dumbbell"></i> Sporting</a>
                    <a href="#"><i class="fas fa-feather"></i> Other Categories</a>
                  </div>
                </div>
              </li>
    
              <li class="nav-item">
                <div class="dropdown">
                <a href="#" class="nav-link dropbtn text-dark">Account</a>
                <div class="dropdown-content">
                <?php

                if(isset($_SESSION['Username']) || isset($_COOKIE['email'])){
                ?>
                  
                  
                    <a href="#">Profile</a>
                    <a href="cart.php">Wishlist (<span><?php echo count(getData('Wishlist'));?></span>)</a>
                    <a href="#">History</a>
                    <a href="logout.php">Logout</a>
                <?php
                }
                else
                {
                ?>
                <div class="container">
                  <a href="login.php">Login</a>
                  <a href="register.php">Sign-Up</a>
                </div>
                <?php
                }
                ?>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="#">Sell</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"></a>
              </li>
            </ul>
          </nav>
        </div>
    </header>
    <!-- header section -->