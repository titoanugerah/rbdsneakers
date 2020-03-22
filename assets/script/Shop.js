$(document).ready(function(){
  GetProduct();
});

function FindByCategory(category){
  $('#search').val(category);
  GetProduct();
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
              '<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">' +
                'Lihat' +
              '</a>' +
            '</div>' +

            '<div class="block2-txt flex-w flex-t p-t-14">' +
              '<div class="block2-txt-child1 flex-col-l ">' +
                '<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">' +
                  result[i].Name +
                '</a>' +

                '<span class="stext-105 cl3">' +
                result[i].Price +
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
