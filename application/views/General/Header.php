<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="<?php echo base_url('./assets/template/cozastore/'); ?>images/icons/favicon.png"/>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/cozastore/'); ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/cozastore/'); ?>fonts/iconic/css/material-design-iconic-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/cozastore/'); ?>fonts/linearicons-v1.0.0/icon-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/slick/slick.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/MagnificPopup/magnific-popup.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/perfect-scrollbar/perfect-scrollbar.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/cozastore/'); ?>css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/template/cozastore/'); ?>css/main.css">
  <!--===============================================================================================-->
</head>
<body class="animsition">

  <!-- Header -->
  <header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
      <!-- Topbar -->


      <div class="wrap-menu-desktop">
        <nav class="limiter-menu-desktop container">

          <!-- Logo desktop -->
          <a href="<?php echo base_url('./assets/template/cozastore/'); ?>#" class="logo">
            <img src="<?php echo base_url('./assets/template/cozastore/'); ?>images/icons/logo-01.png" alt="IMG-LOGO">
          </a>

          <!-- Menu desktop -->
          <div class="menu-desktop">
            <ul class="main-menu">
              <li class="active-menu">
                <a href="<?php echo base_url('./assets/template/cozastore/'); ?>index.html">Home</a>
                <ul class="sub-menu">
                  <li><a href="<?php echo base_url('./assets/template/cozastore/'); ?>index.html">Homepage 1</a></li>
                  <li><a href="<?php echo base_url('./assets/template/cozastore/'); ?>home-02.html">Homepage 2</a></li>
                  <li><a href="<?php echo base_url('./assets/template/cozastore/'); ?>home-03.html">Homepage 3</a></li>
                </ul>
              </li>

              <li>
                <a href="<?php echo base_url('./assets/template/cozastore/'); ?>product.html">Shop</a>
              </li>

              <li>
                <a href="<?php echo base_url('./assets/template/cozastore/'); ?>about.html">About</a>
              </li>

              <li>
                <a href="<?php echo base_url('./assets/template/cozastore/'); ?>contact.html">Contact</a>
              </li>
            </ul>
          </div>

          <!-- Icon header -->
          <div class="wrap-icon-header flex-w flex-r-m">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
              <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">
              <i class="zmdi zmdi-shopping-cart"></i>
            </div>

            <a href="<?php echo base_url('./assets/template/cozastore/'); ?>#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
              <i class="zmdi zmdi-favorite-outline"></i>
            </a>
          </div>
        </nav>
      </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
      <!-- Logo moblie -->
      <div class="logo-mobile">
        <a href="<?php echo base_url('./assets/template/cozastore/'); ?>index.html"><img src="<?php echo base_url('./assets/template/cozastore/'); ?>images/icons/logo-01.png" alt="IMG-LOGO"></a>
      </div>

      <!-- Icon header -->
      <div class="wrap-icon-header flex-w flex-r-m m-r-15">
        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
          <i class="zmdi zmdi-search"></i>
        </div>

        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
          <i class="zmdi zmdi-shopping-cart"></i>
        </div>

        <a href="<?php echo base_url('./assets/template/cozastore/'); ?>#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
          <i class="zmdi zmdi-favorite-outline"></i>
        </a>
      </div>

      <!-- Button show menu -->
      <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </div>
    </div>


    <!-- Menu Mobile -->

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
      <div class="container-search-header">
        <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
          <img src="<?php echo base_url('./assets/template/cozastore/'); ?>images/icons/icon-close2.png" alt="CLOSE">
        </button>

        <form class="wrap-search-header flex-w p-l-15">
          <button class="flex-c-m trans-04">
            <i class="zmdi zmdi-search"></i>
          </button>
          <input class="plh3" type="text" name="search" placeholder="Search...">
        </form>
      </div>
    </div>
  </header>

  <!-- Cart -->
  <div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
      <div class="header-cart-title flex-w flex-sb-m p-b-8">
        <span class="mtext-103 cl2">
          Your Cart
        </span>

        <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
          <i class="zmdi zmdi-close"></i>
        </div>
      </div>

      <div class="header-cart-content flex-w js-pscroll">
        <ul class="header-cart-wrapitem w-full">
          <li class="header-cart-item flex-w flex-t m-b-12">
            <div class="header-cart-item-img">
              <img src="<?php echo base_url('./assets/template/cozastore/'); ?>images/item-cart-01.jpg" alt="IMG">
            </div>

            <div class="header-cart-item-txt p-t-8">
              <a href="<?php echo base_url('./assets/template/cozastore/'); ?>#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                White Shirt Pleat
              </a>

              <span class="header-cart-item-info">
                1 x $19.00
              </span>
            </div>
          </li>

          <li class="header-cart-item flex-w flex-t m-b-12">
            <div class="header-cart-item-img">
              <img src="<?php echo base_url('./assets/template/cozastore/'); ?>images/item-cart-02.jpg" alt="IMG">
            </div>

            <div class="header-cart-item-txt p-t-8">
              <a href="<?php echo base_url('./assets/template/cozastore/'); ?>#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                Converse All Star
              </a>

              <span class="header-cart-item-info">
                1 x $39.00
              </span>
            </div>
          </li>

          <li class="header-cart-item flex-w flex-t m-b-12">
            <div class="header-cart-item-img">
              <img src="<?php echo base_url('./assets/template/cozastore/'); ?>images/item-cart-03.jpg" alt="IMG">
            </div>

            <div class="header-cart-item-txt p-t-8">
              <a href="<?php echo base_url('./assets/template/cozastore/'); ?>#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                Nixon Porter Leather
              </a>

              <span class="header-cart-item-info">
                1 x $17.00
              </span>
            </div>
          </li>
        </ul>

        <div class="w-full">
          <div class="header-cart-total w-full p-tb-40">
            Total: $75.00
          </div>

          <div class="header-cart-buttons flex-w w-full">
            <a href="<?php echo base_url('./assets/template/cozastore/'); ?>shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
              View Cart
            </a>

            <a href="<?php echo base_url('./assets/template/cozastore/'); ?>shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
              Check Out
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
