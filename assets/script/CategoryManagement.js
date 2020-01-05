
$(document).ready(function() {
  $('.select2basic').select2();
  $('#table1').DataTable();
  getCategory();
});

$( "#search" ).on('change', function() {
  getCategory();
});

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


function deleteCategory() {
  $("#detailCategory").modal('hide');
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data : {
      Id: $('#idCategory').val(),
      Email : $('#emailUser').val()
    },
    url: "deleteCategory",
    success: function(result) {
      getCategory();
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
      getCategory();
      notify('fa fa-user', result.title, result.message, result.type);
    },
    error: function(result) {
      console.log(result);
      alert('err');
    }
  });
}

function proceedAddCategory() {
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
      notify('fa fa-user', result.title, result.message, result.status);
    },
    error: function(result) {
      console.log(result);
      alert('err');
    }
  });
}

function getCategory() {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data: {
      Keyword: $('#search').val()
    },
    url: "getCategory",
    success: function(result) {
      console.log(result);
      var html='';
      for(i=0; i<result.category.length; i++){
        if (result.category[i].IsExist==1) {
          html +=
          '<div class="col-sm-6 col-lg-3">' +
          '<div class="card">' +
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
