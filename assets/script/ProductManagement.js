
$(document).ready(function() {
  $('.select2basic').select2();
  $('#table1').DataTable();
  GetDeletedProduct();
  GetProduct();
  GetCategory();
});

$("#search").on('change', function() {
  $('#order').val(0);
  GetProduct();
});

function NextPage(){
  var currentPage = parseInt($('#order').val());
  var newPage = currentPage + 1;
  $('#order').val(newPage);
  GetProduct();
}

function PreviousPage(){
  var currentPage = parseInt($('#order').val());
  var newPage = currentPage - 1;
  if (newPage < 0) {
    newPage = 0;
  }
  $('#order').val(newPage);
  GetProduct();
}

function GetDeletedProduct() {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data: {
      Keyword: "",
      Table : "Product",
      Order : 0
    },
    url: "getAll",
    success: function(result) {
      var html='<option value="0" selected>Silahkan Pilih</option>';
      for(i=0; i<result.product.length; i++){
        if (result.product[i].IsExist==0) {
          html +=
          '<option value="'+result.product[i].Id+'">'+result.product[i].Name+'</option>';
        } else {
          continue;
        }
      }
      $('#idRecoverProduct').html(html);
    },
    error: function(result) {
      alert('error');
    }
  });
}

function GetDetailProduct(id) {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data: {Id: id},
    url: "getDetailProduct",
    success: function(result) {
      console.log(result);
      $("#detailProduct").modal('show');
      $('#nameProduct').val(result.detail.Name);
      $('#idProduct').val(result.detail.Id);
      $('#descriptionProduct').val(result.detail.Description);
      var html;
      for(i=0; i<result.product.length; i++){
        html +=
        '<tr>'+
        '<td>'+result.product[i].Name+'</td>'+
        '</tr>';
      }
      $('#productTableList').html(html);
    },
    error: function(result) {
      alert('error');
    }
  });
}

function DeleteProduct() {
  $("#detailProduct").modal('hide');
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data : {
      Id: $('#idProduct').val(),
      Email : $('#emailUser').val()
    },
    url: "deleteProduct",
    success: function(result) {
      GetProduct();
      GetDeletedProduct();
      notify('fa fa-user', result.title, result.message, result.type);
    },
    error: function(result) {
      console.log(result);
      alert('err');
    }
  });
}

function UpdateProduct() {
  $("#detailProduct").modal('hide');
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
      GetProduct();
      notify('fa fa-user', result.title, result.message, result.type);
    },
    error: function(result) {
      console.log(result);
      alert('err');
    }
  });
}

function UploadFile(type, id) {
  var fd = new FormData();
  var files = $('#fileUpload')[0].files[0];
  fd.append('file',files);
  $.ajax({
    url: 'uploadFile/'+type+'/'+id,
    type: 'post',
    data: fd,
    contentType: false,
    processData: false,
    success: function(response){
      console.log('success', response);
      GetProduct()
    },
    error: function(result){
      console.log('error', result);
      alert('error');
    }
  });
}

function ProceedAddProduct() {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    url: 'addProduct',
    data : {
      Name : $("#addNameProduct").val(),
      Description : $("#addDescriptionProduct").val(),
      CategoryId : $("#addCategoryIdProduct").val(),
      Price : $("#addPriceProduct").val()
    },
    success: function(result) {
      console.log(result);
      UploadFile('Product',result.id);
      GetProduct()
      notify('fa fa-user', result.title, result.message, result.status);
    },
    error: function(result) {
      console.log(result);
      alert('err');
    }
  });
}

function ProceedRecoverProduct(){
  $("#addProduct").modal('hide');
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data : {
      Id: $('#idRecoverProduct').val()
    },
    url: "recoverProduct",
    success: function(result) {
      GetProduct();
      GetDeletedProduct();
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
    url: "getAll",
    success: function(result) {
      var html='<option value="0" selected>Silahkan Pilih</option>';
      for(i=0; i<result.category.length; i++){
        if (result.category[i].IsExist==1) {
          html +=
          '<option value="'+result.category[i].Id+'">'+result.category[i].Name+'</option>';
        } else {
          continue;
        }
      }
      console.log('category',result);
      $('#addCategoryIdProduct').html(html);
    },
    error: function(result) {
      alert('error');
    }
  });
}

function GetProduct() {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data: {
      Keyword: $('#search').val(),
      Order: $('#order').val(),
      Table : "Product"
    },
    url: "getAll",
    success: function(result) {
      var html='';
      for(i=0; i<result.product.length; i++){
        if (result.product[i].IsExist==1) {
          html +=
          '<div class="col-sm-6 col-lg-3">' +
          '<div class="card">' +
          '<div class="p-2">' +
          '<img class="card-img-top rounded" src="assets/picture/'+result.product[i].Image+'">' +
          '</div>' +
          '<div class="card-body pt-2">' +
          '<h4 class="mb-1 fw-bold">' +
          result.product[i].Name +
          '</h4>' +
          '<br>' +
          '<center>' +
          '<a type="button" class="btn btn-secondary btn-round" href="detailProduct/'+result.product[i].Id+'">Detail</a>'+
          '</center>' +
          '</div>' +
          '</div>' +
          '</div>';
        } else {
          continue;
        }

      }
      $('#productList').html(html);
    },
    error: function(result) {
      alert('error');
    }
  });
}
