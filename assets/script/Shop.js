$(document).ready(function(){
  GetProduct();
  GetCart();
});

function FindByCategory(category){
  $('#search').val(category);
  GetProduct();
}

function FormatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
}

function GetCart(){
  $.ajax({
    type: "POST",
    dataType : "JSON",
    url: 'getCart' ,
    success: function(result) {
      console.log(result);
      var cartList = "";
      result.forEach(cart => {
        cartList = cartList + 
        '<li class="header-cart-item flex-w flex-t m-b-12">' +
          '<div class="header-cart-item-img" onclick="deleteFromCart('+cart.Id+')">' +
            '<img src="assets/picture/'+cart.Image+'" alt="IMG">' +
          '</div>' + 
        '<div class="header-cart-item-txt p-t-8" >' +
          '<button  class="header-cart-item-name m-b-18 hov-cl1 trans-04">' +
            cart.Product + " " + cart.Model  + 
          '</button>' +
          '<span class="header-cart-item-info">' +
            cart.Color + " ukuran " + cart.Size +
            '<br>' +
            pricify(cart.Total) +
          '</span>' +
        '</div>' +
      '</li>';

      });

      $('#cartList').html(cartList);

      // $('.js-modal1').addClass('show-modal1');
      
      
    },
    error: function(result) {
//      swal("Gagal", "Pengguna", "success");
    }
  });
}

function deleteFromCart(id){
  $.ajax({
    type: "POST",
    dataType : "JSON",
    url: 'deleteFromCart' ,
    data: {
      Id  : id
    },
    success: function(result) {
      console.log(result);
      GetCart();
      $('.js-hide-cart').click();      
      swal.fire("Berhasil", "Berhasil dihapus", "success");

    },
    error: function(result) {
      swal($('#productName').text(), "Gagal dihapus", "danger");
    }
  });
}

function AddToCart(){
  $.ajax({
    type: "POST",
    dataType : "JSON",
    url: 'addToCart' ,
    data: {
      VariantId  : $('#productVariantId').val(),
      Size : $('#productSize').val(),
      Qty :  $('#productQty').val()     
    },
    success: function(result) {
      console.log(result);
      $('.js-hide-modal1').click();
      Swal.fire($('#productName').text(), "Berhasil ditambahkan", "success");

      GetCart();      
    },
    error: function(result) {
      $('.js-hide-modal1').click();

      Swal.fire($('#productName').text(), "Gagal ditambahkan", "danger");
    }
  });
}

function pricify( num ) {
  var str = num.toString().split('.');
  if (str[0].length >= 5) {
      str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1.');
  }
  if (str[1] && str[1].length >= 5) {
      str[1] = str[1].replace(/(\d{3})/g, '$1 ');
  }
  return "Rp. "+str.join('.');
}

$('#productVariantId').on('change', function(){
  $.ajax({
    type: "POST",
    dataType : "JSON",
    url: 'getSizeVariant' ,
    data: {
      Id  : $('#productVariantId').val(),
    },
    success: function(result) {
      console.log(result);
      var selectSize = "<option>Pilih Ukuran</option>";

      result.forEach(element => {
        if(element.Stock >0) 
        {
          selectSize = selectSize + "<option value="+element.Size+"> "+ element.Size +" ( Tersedia "+element.Stock +" ) </option>";        
        } else {
          selectSize = selectSize + "<option value="+element.Size+"  disabled> "+ element.Size +" ( Tersedia "+element.Stock +" ) </option>";        

        }
      });

      $('#productSize').html(selectSize);

      $('.js-modal1').addClass('show-modal1');
      
      
    },
    error: function(result) {
      alert('err');
    }
  });

});

function  DetailProduct(id){
  $.ajax({
    type: "POST",
    dataType : "JSON",
    url: 'getDetailProduct' ,
    data: {
      Id  : id,
    },
    success: function(result) {
      console.log(result);
      var i = 0;
      var carouselIndicator = '<li data-target="#carouselExampleIndicators" data-slide-to="'+i+'" class="active"></li>';
      var carouselImage = 
      '<div class="carousel-item active">' + 
        '<img class="d-block w-100" src="assets/picture/'+result.detail.Image+'" style="max-height:700px;max-width:700px;">' +
        '<div class="carousel-caption d-none d-md-block">' +
          '<h5>Gambar Utama</h5>' +
        '</div>' +
      '</div>';



      var selectVariant = "<option>Pilih Varian</option>";
      // $('.js-show-modal1').click();
      $('#productName').html(result.detail.Name);
      $('#productPrice').html(pricify(result.detail.Price));
      $('#productDescription').html(result.detail.Description);

      result.variant.forEach(element => {
        i++;
        carouselIndicator = carouselIndicator + '<li data-target="#carouselExampleIndicators" data-slide-to="'+i+'" class="active"></li>';
        carouselImage = carouselImage + 
        '<div class="carousel-item .variant'+element.Id+'">' + 
          '<img class="d-block w-100" src="assets/picture/'+element.Image+'" style="max-height:700px;max-width:700px;">' +
          '<div class="carousel-caption d-none d-md-block">' +
            '<h5>Varian '+element.Model+'</h5>' +
            '<p>Warna '+element.Color+'</p>' +
          '</div>' +
        '</div>';
        selectVariant = selectVariant + "<option value='"+element.Id+"'> "+ element.Model +" - "+element.Color +" </option>";        

  
      });

      $('#productVariantId').html(selectVariant);
      $('#carouselImage').html(carouselImage);
      $('#carouselIndicator').html(carouselIndicator);
      $('.js-modal1').addClass('show-modal1');
      
      
    },
    error: function(result) {
      alert('err');
    }
  });
}

function Checkout() {
  $('.js-hide-cart').click();      

  Swal.mixin({
    input: 'text',
    confirmButtonText: 'Selanjutnya &rarr;',
    showCancelButton: true,
    progressSteps: ['1', '2', '3']
  }).queue([
    {
      title: 'Konfirmasi Nama',
      text: 'Silahkan masukan nama penerima'
    },
    {
      title: 'Konfirmasi Alamat',
      text: 'Silahkan masukan alamat pengiriman'
    },
    {
      title: 'Konfirmasi Nomor HP',
      text: 'Silahkan masukan Nomor HP Penerima'
    }
  ]).then((result) => {
    console.log(result);
    if (result.value) {
      const answers = JSON.stringify(result.value)
//       console.log(result.value[0]); GOT IT

      $.ajax({
          type: "POST",
          dataType : "JSON",
          url: 'checkout' ,
          data: {
            CustomerName : result.value[0],
            DeliveryAddress  : result.value[1],
            CustomerPhone  : result.value[2]
          },
          success: function(result) {
            console.log(result);
//            swal($('#productName').text(), "Berhasil ditambahkan", "success");
            Swal.fire({
              title: 'Tahap konfirmasi selesai',
              text: 'Silahkan periksa email dan lakukan pembayaran sebesar '+pricify(result),
              // html: `
              //   Your answers:
              //   <pre><code>${answers}</code></pre>
              // `,
              confirmButtonText: 'Tutup'
            })

            GetCart();      
          },
          error: function(result) {
            swal($('#productName').text(), "Gagal ditambahkan", "danger");
          }
        });
    }
  })
}

function GetProduct(){
  var categoryId = 0;;
  if (location.search.replace('?CategoryId=','')!="") {
     categoryId = location.search.replace('?CategoryId=','');
  }
  $.ajax({
    type: "POST",
    dataType : "JSON",
    url: 'getProduct' ,
    data: {
      CategoryId : categoryId,
      Keyword : $('#search').val(),
      Count:25
    },
    success: function(result) {
      var html = "";
      console.log(result);
      for (var i = 0; i < result.length; i++) {
        if(result[i].IsExist == 1) {
          html = html +
          '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item '+result[i].Category+'">' +
            '<div class="block2">' +
              '<div class="block2-pic hov-img0">' +
                '<img src="assets/picture/'+result[i].Image+'" alt="IMG-PRODUCT">' +
                '<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal2" onclick="DetailProduct('+result[i].Id+')">' +
                  'Lihat' +
                '</a>' +
              '</div>' +

              '<div class="block2-txt flex-w flex-t p-t-14">' +
                '<div class="block2-txt-child1 flex-col-l ">' +
                  '<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">' +
                    result[i].Name +
                  '</a>' +

                  '<span class="stext-105 cl3">' +
                  "Rp. "+FormatNumber(result[i].Price) +
                '</span>' +
                '</div>' +

                '<div class="block2-txt-child2 flex-r p-t-3">' +
                  '<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">' +
                    '<img class="icon-heart1 dis-block trans-04" src="assets/template/cozastore/images/icons/icon-heart-01.png" alt="ICON">' +
                    '<img class="icon-heart2 dis-block trans-04 ab-t-l" src="assets/template/cozastore/images/icons/icon-heart-02.png" alt="ICON">' +
                  '</a>' +
                '</div>' +
              '</div>' +
            '</div>' +
          '</div>';
        } else {
          continue;
        }
      }

      $('#products').html(html);

    },
    error: function(result) {
      alert('err');
    }
  });
}
