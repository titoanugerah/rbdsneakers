$(document).ready(function(){
  GetDetailProduct();
  GetCategory();
});

var categoryId;

function GetCategory() {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data: {
      Keyword: "",
      Table : 'Category',
      Order: 0
    },
    url: 'getAll',
    success: function(result) {
      var html='<option value="0" selected>Silahkan Pilih</option>';
      for(i=0; i<result.category.length; i++){
        console.log(categoryId);
        if (result.category[i].IsExist==1) {
          if (result.category[i].Id == categoryId) {
            html +=
            '<option value="'+result.category[i].Id+'" selected>'+result.category[i].Name+'</option>';
          } else {
            html +=
            '<option value="'+result.category[i].Id+'">'+result.category[i].Name+'</option>';
          }
        } else {
          continue;
        }
      }
      $('#categoryIdProduct').html(html);
    },
    error: function(result) {
      alert('error', url);
    }
  });
}

function GetDetailProduct() {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data: {
      Table : 'Product', Variable : 'Id', Value : $('#idProduct').val()
    },
    url: "getDetail",
    success: function(result) {
      console.log('Details',result);
      $('#nameProduct').val(result.detail.Name);
      $('#priceProduct').val(result.detail.Price);
      categoryId = result.detail.CategoryId;
      $('#descriptionProduct').val(result.detail.Description);
      $('#imageProduct').attr('src', '/rbdsneakers/assets/picture/'+result.detail.Image);

      var html='';
      for(i=0; i<result.variant.length; i++){
        console.log('length',result.variant.length);
        console.log('val', result.variant[i])
        if (result.variant[i].IsExist==1) {
          html +=
          '<div class="col-sm-6 col-lg-3">' +
          '<div class="card">' +
          '<div class="p-2">' +
          '<img class="card-img-top rounded" src="assets/picture/'+result.variant[i].Image+'">' +
          '</div>' +
          '<div class="card-body pt-2">' +
          '<h4 class="mb-1 fw-bold">' +
          result.variant[i].Model + " - " + result.variant[i].Color +
          '</h4>' +
          '<br>' +
          '<center>' +
          '<a type="button" class="btn btn-secondary btn-round" href="detailProduct/'+result.variant[i].Id+'">Detail</a>'+
          '</center>' +
          '</div>' +
          '</div>' +
          '</div>';
        } else {

          continue;
        }
      }
      console.log(html);
      $('#data2').html(html);

    },
    error: function(result) {
      alert('error', url);
    }
  });
}
