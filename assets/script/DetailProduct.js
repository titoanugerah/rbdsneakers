$(document).ready(function(){
  var categoryId;
  GetDetailProduct();
  GetCategory();
});


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
      console.log('category',result);
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
      Table : 'Product', Variable : 'Id', Value : 1
    },
    url: "getDetail",
    success: function(result) {
      console.log('Details',result);
      $('#nameProduct').val(result.detail.Name);
      $('#priceProduct').val(result.detail.Price);
      //$('#categoryIdProduct').attr('value',result.detail.CategoryId);
      categoryId = result.detail.CategoryId;
      $('#descriptionProduct').val(result.detail.Description);
      $('#imageProduct').attr('src', '/rbdsneakers/assets/picture/'+result.detail.Image);
    },
    error: function(result) {
      alert('error', url);
    }
  });
}
