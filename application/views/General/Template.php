
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
          <a href="<?php echo base_url(''); ?>" class="logo">
            <img src="<?php echo base_url('./assets/template/cozastore/'); ?>images/icons/logo-01.png" alt="IMG-LOGO">
          </a>

          <!-- Menu desktop -->
          <div class="menu-desktop">
            <ul class="main-menu">
              <li class="">
                <a href="<?php echo base_url(''); ?>">Home</a>
              </li>

              <li>
                <a href="<?php echo base_url('shop'); ?>">Shop</a>
              </li>

              <li>
                <a href="<?php echo base_url('about'); ?>">About</a>
              </li>

              <li>
                <a href="<?php echo base_url('contact'); ?>">Contact</a>
              </li>

              <li>
                <a href="<?php echo base_url('dashboard'); ?>" <?php if($this->session->userdata['Role']!='Management'){echo 'hidden'; } ?>>Dashboard </a>
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
          Keranjang Belanja
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll">



				<div class="w-full" <?php if($this->session->userdata['isLogin']){echo 'hidden';} ?>>
					<p>Anda belum login, silahkan klik tombol dibawah ini untuk masuk</p>
          <br>
					<div class="header-cart-buttons flex-w w-full">
						<a href="<?php echo $this->session->flashdata('link'); ?>" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							Login dengan Google
						</a>
					</div>
				</div>
				<div class="w-full" <?php if(!$this->session->userdata['isLogin'] || $this->session->userdata['isLogin']==null){echo 'hidden';} ?>>
					<div class="header-cart-buttons flex-w w-full">
						<p><?php echo $this->session->userdata['Fullname']; ?><a href="<?php echo base_url('logout'); ?>">
							(Logout)
						</a></p>

					</div>
				</div>
        <ul class="header-cart-wrapitem w-full" id='cartList'>
         

        </ul>
        <button >Beli Sekarang</button>

			</div>
		</div>
	</div>




  <!--content-->
  <?php $this->load->view('General/'.$view); ?>
  <!--content-->




  <footer class="bg3 p-t-75 p-b-32">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-lg-3 p-b-50">
          <h4 class="stext-301 cl0 p-b-30">
            Categories
          </h4>

          <ul>
            <?php foreach ($category as $item): ?>
              <li class="p-b-10">
                <a href="<?php echo base_url('product?CategoryId='.$item->Id); ?>" class="stext-107 cl7 hov-cl1 trans-04">
                  <?php echo $item->Name; ?>
                </a>
              </li>
            <?php endforeach; ?>

          </ul>
        </div>



        <div class="col-sm-6 col-lg-3 p-b-50">
          <h4 class="stext-301 cl0 p-b-30">
            GET IN TOUCH
          </h4>

          <p class="stext-107 cl7 size-201">
            Any questions? Let us know in store at <?php echo $webConf->office_address; ?> or call us on <?php echo $webConf->office_phone_number; ?>
          </p>

          <div class="p-t-27">
            <a href="<?php echo 'https://www.facebook.com/'.$webConf->official_facebook_account; ?>" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
              <i class="fa fa-facebook"></i>
            </a>

            <a href="<?php echo 'https://www.instagram.com/'.$webConf->official_instagram_account; ?>" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
              <i class="fa fa-instagram"></i>
            </a>

            <a href="<?php echo 'https://www.twitter.com/'.$webConf->official_twitter_account; ?>" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
              <i class="fa fa-twitter"></i>
            </a>
          </div>
        </div>


      </div>

      Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="<?php echo base_url('./assets/template/cozastore/'); ?>https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

        </p>
      </div>
    </div>
  </footer>


  <!-- Back to top -->
  <div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
      <i class="zmdi zmdi-chevron-up"></i>
    </span>
  </div>

  <!-- Modal1 -->

  <script src="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/jquery/jquery-3.2.1.min.js"></script>
  <?php if(file_exists('./assets/script/'.$view.'.js')) {

    echo "<script type='text/javascript' src=".base_url('./assets/script/'.$view.'.js')."></script>";
  } ?>


  <!--===============================================================================================-->
  <script src="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/bootstrap/js/popper.js"></script>
  <script src="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/select2/select2.min.js"></script>
  <script>
    $(".js-select2").each(function(){
      $(this).select2({
        minimumResultsForSearch: 20,
        dropdownParent: $(this).next('.dropDownSelect2')
      });
    })
  </script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/daterangepicker/moment.min.js"></script>
  <script src="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/daterangepicker/daterangepicker.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/slick/slick.min.js"></script>
  <script src="<?php echo base_url('./assets/template/cozastore/'); ?>js/slick-custom.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/parallax100/parallax100.js"></script>
  <script>
        $('.parallax100').parallax100();
  </script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
  <script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
      $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
              enabled:true
            },
            mainClass: 'mfp-fade'
        });
    });
  </script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/isotope/isotope.pkgd.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/sweetalert/sweetalert.min.js"></script>
  <script>
    $('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
      e.preventDefault();
    });

    $('.js-addwish-b2').each(function(){
      var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
      $(this).on('click', function(){
        swal(nameProduct, "is added to wishlist !", "success");

        $(this).addClass('js-addedwish-b2');
        $(this).off('click');
      });
    });

    $('.js-addwish-detail').each(function(){
      var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

      $(this).on('click', function(){
        swal(nameProduct, "is added to wishlist !", "success");

        $(this).addClass('js-addedwish-detail');
        $(this).off('click');
      });
    });

    /*---------------------------------------------*/

    // $('.js-addcart-detail').each(function(){
    //   var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
    //   $(this).on('click', function(){
    //     swal(nameProduct, "is added to cart !", "success");
    //   });
    // });

  </script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script>
    $('.js-pscroll').each(function(){
      $(this).css('position','relative');
      $(this).css('overflow','hidden');
      var ps = new PerfectScrollbar(this, {
        wheelSpeed: 1,
        scrollingThreshold: 1000,
        wheelPropagation: false,
      });

      $(window).on('resize', function(){
        ps.update();
      })
    });
  </script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('./assets/template/cozastore/'); ?>js/main.js"></script>

  </body>
  </html>
