$(document).ready(function(){
  GetProduct();
});

function FindByCategory(category){
  $('#search').val(category);
  GetProduct();
}

function FormatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
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
          selectSize = selectSize + "<option> "+ element.Size +" ( Tersedia "+element.Stock +" ) </option>";        
        } else {
          selectSize = selectSize + "<option disabled> "+ element.Size +" ( Tersedia "+element.Stock +" ) </option>";        

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
      var selectVariant = "<option>Pilih Varian</option>";
      var imageVariant = '<div class="slick3 gallery-lb">' +
      '<div class="item-slick3" data-thumb="assets/template/cozastore/images/product-detail-01.jpg">' +
        '<div class="wrap-pic-w pos-relative">' +
          '<img src="assets/template/cozastore/images/product-detail-01.jpg" alt="IMG-PRODUCT">' +

          '<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="assets/template/images/product-detail-01.jpg">' +
            '<i class="fa fa-expand"></i>' + 
          '</a>' +
        '</div>' +
      '</div>';

      // $('.js-show-modal1').click();
      $('#productName').html(result.detail.Name);
      $('#productPrice').html(pricify(result.detail.Price));
      $('#productDescription').html(result.detail.Description);

      result.variant.forEach(element => {
        selectVariant = selectVariant + "<option value='"+element.Id+"'> "+ element.Model +" - "+element.Color +" </option>";        
        imageVariant = imageVariant +
        '<div class="item-slick3" data-thumb="assets/template/cozastore/images/product-detail-01.jpg">' +
          '<div class="wrap-pic-w pos-relative">' +
            '<img src="assets/template/cozastore/images/product-detail-01.jpg" alt="IMG-PRODUCT">' +
  
            '<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="assets/template/images/product-detail-01.jpg">' +
              '<i class="fa fa-expand"></i>' + 
            '</a>' +
        '</div>';
  
      });
      console.log(imageVariant);

      $('#productVariantId').html(selectVariant);
      $('#imageVariant').html(imageVariant);
      $('.js-modal1').addClass('show-modal1');
      
      
    },
    error: function(result) {
      alert('err');
    }
  });
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
      }

      $('#products').html(html);

    },
    error: function(result) {
      alert('err');
    }
  });
}
