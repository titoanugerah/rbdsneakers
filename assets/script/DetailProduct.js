$(document).ready(function(){
  $('.select2basic').select2();
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
      alert('error', result);
    }
  });
}

function ProceedAddVariant() {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    url: 'addVariant',
    data : {
      Model : $('#addModelVariant').val(),
      ProductId : $('#idProduct').val(),
      Color : $('#addColorVariant').val()
    },
    success: function(result) {
      UploadFile('fileUpload2','Variant',result.id);
      GetDetailProduct();
      notify('fa fa-user', result.title, result.message, result.status);
    },
    error: function(result) {
    }
  });
}

function UploadFile(form, type, id) {
  var fd = new FormData();
  var files = $('#'+form)[0].files[0];
  fd.append('file',files);
  $.ajax({
    url: 'uploadFile/'+type+'/'+id,
    type: 'post',
    data: fd,
    contentType: false,
    processData: false,
    success: function(response){
      GetDetailProduct();
    },
    error: function(result){
      alert('error');
    }
  });
}

function ProceedRecoverVariant(){
  $("#addVariantForm").modal('hide');
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data : {
      Table: 'Variant',
      Id: $('#idRecoverVariant').val()
    },
    url: "recover",
    success: function(result) {
      GetDetailProduct();
      notify('fa fa-user', result.title, result.message, result.type);
    },
    error: function(result) {
      console.log(result);
      alert('err');
    }
  });
}

function GetDetailProduct() {
  var url;
  if("<?php echo $webConf->status; ?>" == "live"){
    url = 'localhost';
  } else {
    url = 'http://localhost/rbdsneakers/';
  }
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data: {
      Table : 'Product', Variable : 'Id', Value : $('#idProduct').val()
    },
    url: "getDetail",
    success: function(result) {
      $('#nameProduct').val(result.detail.Name);
      $('#priceProduct').val(result.detail.Price);
      categoryId = result.detail.CategoryId;
      $('#descriptionProduct').val(result.detail.Description);
      $('#imageProduct').attr('src', '/rbdsneakers/assets/picture/'+result.detail.Image);
      var html='';
      var html2 = '<option value="0" deselect>Silahkan Pilih</option>';

      for(i=0; i<result.variant.length; i++){
        if (result.variant[i].IsExist==1) {
          html +=
          '<div class="col-sm-6 col-lg-3">' +
          '<div class="card">' +
          '<div class="p-2">' +
          '<img class="card-img-top rounded" src="'+url+'assets/picture/'+result.variant[i].Image+'">' +
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
          html2 +='<option value="'+result.variant[i].Id+'">'+result.variant[i].Model+'</option>';
        }
      }
      $('#data2').html(html);
      $('#idRecoverVariant').html(html2);
    },
    error: function(result) {
      alert('error', url);
    }
  });
}
