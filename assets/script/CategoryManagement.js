
$(document).ready(function() {
  $('.select2basic').select2();
  $('#table1').DataTable();
  getDeletedCategory();
  GetCategory();
});
$( "#search" ).on('change', function() {
  GetCategory();
});



function getDeletedCategory() {
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
      console.log('deleted',result);
      var html='<option value="0" selected>Silahkan Pilih</option>';
      for(i=0; i<result.category.length; i++){
        if (result.category[i].IsExist==0) {
          html +=
          '<option value="'+result.category[i].Id+'">'+result.category[i].Name+'</option>';
        } else {
          continue;
        }

      }
      $('#idRecoverCategory').html(html);
    },
    error: function(result) {
      alert('error');
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
    },
    error: function(result){
      console.log('error', result);
      alert('error');
    }
  });
}

function GetDetailCategory(id) {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data: {Id: id},
    url: "getDetailCategory",
    success: function(result) {
      console.log(result);
      $("#detailCategory").modal('show');
      $('#nameCategory').val(result.detail.Name);
      $('#idCategory').val(result.detail.Id);
      $('#descriptionCategory').val(result.detail.Description);
      $('#filePreview').attr('src', 'assets/picture/'+result.detail.Image);
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


function DeleteCategory() {
  $("#detailCategory").modal('hide');
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data : {
      Id: $('#idCategory').val(),
      Table : 'Category'
    },
    url: "delete",
    success: function(result) {
      GetCategory();
      getDeletedCategory();
      notify('fa fa-user', result.title, result.message, result.type);
    },
    error: function(result) {
      console.log(result);
      alert('err');
    }
  });
}

function UpdateCategory() {
  $("#detailCategory").modal('hide');
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data : {
      Id: $('#idCategory').val(),
      Name: $('#nameCategory').val(),
      Description : $('#descriptionCategory').val()
    },
    url: "updateCategory",
    success: function(result) {
      UploadFile('Category', $('#idCategory').val());
      console.log('Updating');
      GetCategory();
      notify('fa fa-user', result.title, result.message, result.type);
    },
    error: function(result) {
      console.log(result);
      alert('err');
    }
  });
}

function ProceedAddCategory() {
  var urls = 'addCategory';
  $.ajax({
    type: "POST",
    dataType : "JSON",
    url: urls,
    data : {
      Name : $("#addNameCategory").val(),
      Description : $("#addDescriptionCategory").val()
    },
    success: function(result) {
      UploadFile('Category', result.Id);
      notify('fa fa-user', result.title, result.message, result.status);
      GetCategory();
    },
    error: function(result) {
      console.log(result);
      alert('err');
    }
  });
}

function ProceedRecoverCategory(){
  $("#addCategory").modal('hide');
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data : {
      Id: $('#idRecoverCategory').val(),
      Table : "Category",
    },
    url: "recover",
    success: function(result) {
      GetCategory();
      getDeletedCategory();
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
      Table: 'Category',
      Keyword: $('#search').val(),
      Order: 0
    },
    url: "getAll",
    success: function(result) {
      console.log(result);
      var html='';
      for(i=0; i<result.category.length; i++){
        if (result.category[i].IsExist==1) {
          html +=
          '<div class="col-sm-6 col-lg-3">' +
          '<div class="card">' +
          '<div class="p-2">' +
          '<img class="card-img-top rounded" src="assets/picture/'+result.category[i].Image+'">' +
          '</div>' +
          '<div class="card-body pt-2">' +
          '<h4 class="mb-1 fw-bold">' +
          result.category[i].Name +
          '</h4>' +
          '<br>' +
          '<center>' +
          '<button type="button" class="btn btn-secondary btn-round" onclick="GetDetailCategory('+result.category[i].Id+')">Detail</button>'+
          '</center>' +
          '</div>' +
          '</div>' +
          '</div>';
        } else {
          continue;
        }

      }
      $('#categoryList').html(html);
    },
    error: function(result) {
      alert('error');
    }
  });
}
