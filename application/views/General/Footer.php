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
              <a href="<?php echo base_url('./assets/template/cozastore/'); ?>#" class="stext-107 cl7 hov-cl1 trans-04">
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


<!--===============================================================================================-->
<script src="<?php echo base_url('./assets/template/cozastore/'); ?>vendor/jquery/jquery-3.2.1.min.js"></script>
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
  $('.js-addwish-b2').on('click', function(e){
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

  $('.js-addcart-detail').each(function(){
    var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
    $(this).on('click', function(){
      swal(nameProduct, "is added to cart !", "success");
    });
  });

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
