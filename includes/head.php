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

    <?php
    require('functions/config.php');?>
    <title>Lemu Online Store</title>
</head>
<style>
body{
    margin: 0;
    padding; 0;
    text-align: center;
    background-image: linear-gradient(rgba(0, 0, 50, 0.5),rgba(0, 0, 50, 0.5)),url(assets/sign.jpg);
    background-size: 100% 100%; 
    background-attachment: fixed; 
    width: 100%; 
    height: 100%;
}
.container 
{
    margin-top: 100px;
    color: #fff;
    transition: all 4s ease-in-out;
}
.form
{
    margin-top: 50px;
    transition: all 4s ease-in-out;
}
.form-control
{
    background: transparent;
    border: none;
    outline: none;
    border-bottom: 1px solid gray;
    color: #fff;
    margin-bottom: 16px;
}
.title h2 
{
    font-weight: bold;
}

</style>
<body >