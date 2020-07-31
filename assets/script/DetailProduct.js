$(document).ready(function(){
  $('.select2basic').select2();
  GetDetailProduct();
  GetCategory();
  $('#search').attr('placeholder', 'Feature Not Available');
  $('#search').attr('disabled', true);

});

var categoryId;

function UpdateProduct() {
//  $("#detailProduct").modal('hide');
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data : {
      Id: $('#idProduct').val(),
      Name: $('#nameProduct').val(),
      Description : $('#descriptionProduct').val()
    },
    url: "updateProduct",
    success: function(result) {
      UploadFile('fileUpload','Product',$('#idProduct').val());
      GetDetailProduct();
      notify('fa fa-user', result.title, result.message, result.type);
    },
    error: function(result) {
      console.log(result);
      alert('err');
    }
  });
}

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

function GetDetailVariant(id) {
  $('#updateVariantForm').modal('show');
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data: {
      Table : 'Variant', Variable : 'Id', Value : id
    },
    url: "getDetail",
    success: function(result) {
      console.log(result);
      html = '';
      html1 = '';
      html2 = '';
      $('#updateIdVariant').val(result.detail.Id);
      $('#updateModelVariant').val(result.detail.Model);
      $('#updateColorVariant').val(result.detail.Color);
      $('#imageVariant').attr('src', '/rbdsneakers/assets/picture/'+result.detail.Image);
      for(i=1; i<=result.size.length; i++){
        html = html +
        '<tr>'+
          '<td>'+i+'</td>'+
          '<td colspan="2">'+result.size[i-1].Size+'</td>' +
          '<td colspan="2">'+result.size[i-1].Stock+'</td>' +
        '</tr>';

        html1 = html1 +
        '<option value="'+result.size[i-1].Size+'">'+result.size[i-1].Size+'</option>';

      }
      for(i=result.stock.length-1; i>=0; i--){
        if (result.stock[i].Stock == 0) {
          continue;
        } else {
          html2 =
          html2 +
          '<tr>'+
          '<td colspan="2">'+result.stock[i].Size+'</td>' +
          '<td colspan="2">'+result.stock[i].Stock+'</td>' +
          '<td colspan="2">'+result.stock[i].Date+'</td>' +
          '</tr>';
        }
      }

      $('#sizeTableList').html(html);
      $('#addStockSize').html(html1);
      $('#stockTableList').html(html2);
    },
    error: function(result) {
      alert('error');
    }
  });
}

function ProceedAddSize() {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data: {
      VariantId : $('#updateIdVariant').val(),
      Size : $('#addSizeVariant').val(),
    },
    url: 'addSize',
    success: function(result) {
      notify('fa fa-user', result.title, result.message, result.status);
      GetDetailVariant($('#updateIdVariant').val());
    },
    error: function(result) {
      console.log(result);
      alert('error');
    }
  });
}

function ProceedAddStock() {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data: {
      VariantId : $('#updateIdVariant').val(),
      Size : $('#addStockSize').val(),
      Stock : $('#addStockQty').val()
    },
    url: 'addStock',
    success: function(result) {
      notify('fa fa-user', result.title, result.message, result.status);
      GetDetailVariant($('#updateIdVariant').val());
    },
    error: function(result) {
      console.log(result);
      alert('error');
    }
  });
}

function ProceedUpdateVariant() {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data: {
      VariantId : $('#updateIdVariant').val(),
      Model : $('#updateModelVariant').val(),
      Color : $('#updateColorVariant').val()
    },
    url: 'updateVariant',
    success: function(result) {
      console.log(result);
      UploadFile('fileUpload3','Variant', $('#updateIdVariant').val());
      notify('fa fa-user', result.title, result.message, result.status);
      GetDetailVariant($('#updateIdVariant').val());
      GetDetailProduct();
    },
    error: function(result) {
      console.log(result);
      alert('error');
    }
  });

}

function Delete(table, id){
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data: {
      Table : table,
      Id : $("#"+id).val()
    },
    url: 'delete',
    success: function(result) {
      console.log(result);
      notify('fa fa-user', result.title, result.message, result.status);
      $('#updateVariantForm').modal('hide');
      GetDetailProduct();
    },
    error: function(result) {
      console.log(result);
      alert('error');
    }
  });
}

function Recover(table, id){
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data: {
      Table : table,
      Id : $("#"+id).val()
    },
    url: 'recover',
    success: function(result) {
      console.log(result);
      notify('fa fa-user', result.title, result.message, result.status);
      GetDetailProduct();
    },
    error: function(result) {
      console.log(result);
      alert('error');
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
          '<button type="button" class="btn btn-secondary btn-round" onclick="GetDetailVariant('+result.variant[i].Id+')">Detail</button>'+
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
