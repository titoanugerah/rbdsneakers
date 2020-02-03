$(document).ready(function() {
  $('.select2basic').select2();
  $('#table1').DataTable();
  getAccount();
});
$( "#search" ).on('change', function() {
  $('#order').val(0);
  getAccount();
});

function NextPage(){
  var currentPage = parseInt($('#order').val());
  var newPage = currentPage + 1;
  $('#order').val(newPage);
  getAccount();
}

function PreviousPage(){
  var currentPage = parseInt($('#order').val());
  var newPage = currentPage - 1;
  if (newPage < 0) {
    newPage = 0;
  }
  $('#order').val(newPage);
  getAccount();
}

function DeleteAccountManagement() {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    url: 'delete' ,
    data: {
      Table: 'Management',
      Id: $('#idManagement').val()
    },
    success: function(result) {
      notify('fa fa-user', result.title, result.message, result.type);
      getAccount();
    },
    error: function(result) {
      alert('err');
    }
  });
}

function getAccount() {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data: {
      Table1: 'Management',
      Table2: 'Customer',
      Keyword: $('#search').val(),
      Order: parseInt($('#order').val())
    },
    url: "getAll2",
    success: function(result) {
      var html1='';
      var html2='';
      for(i=0; i<result.customer.length; i++){
        html1 +=
        '<div class="col-sm-6 col-lg-3">' +
        '<div class="card">' +
        '<div class="p-2">' +
        '<img class="card-img-top rounded" src="'+result.customer[i].Image+'">' +
        '</div>' +
        '<div class="card-body pt-2">' +
        '<h4 class="mb-1 fw-bold">' +
        result.customer[i].Fullname +
        '</h4>' +
        '<br>' +
        '<center>' +
        '<button type="button" class="btn btn-secondary btn-round" onclick="GetDetailCustomer('+result.customer[i].Id+')">Detail</button>'+
        '</center>' +
        '</div>' +
        '</div>' +
        '</div>';

      }

      for(i=0; i<result.management.length; i++){
        if (result.management[i].IsExist==1) {
          html2 +=
          '<div class="col-sm-6 col-lg-3">' +
          '<div class="card">' +
          '<div class="p-2">' +
          '<img class="card-img-top rounded" src="'+result.management[i].Image+'">' +
          '</div>' +
          '<div class="card-body pt-2">' +
          '<h4 class="mb-1 fw-bold">' +
          result.management[i].Fullname +
          '</h4>' +
          '<br>' +
          '<center>' +
          '<button type="button" class="btn btn-secondary btn-round" onclick="GetDetailManagement('+result.management[i].Id+')">Detail</button>'+
          '</center>' +
          '</div>' +
          '</div>' +
          '</div>';
        } else {
          continue;
        }

      }
      $('#data1').html(html1);
      $('#data2').html(html2);
    },
    error: function(result) {
      alert('error');
    }
  });
}

function GetDetailCustomer(id) {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    url: "getDetailCustomer?Id="+id,
    success: function(result) {
      $("#detailAccount").modal('show');
      $('#fullname').val(result.detail.Fullname);
      $('#email').val(result.detail.Email);
      $('#customerImage').attr('src', result.detail.Image);
      var html;
      for(i=0; i<result.order.length; i++){
        html +=
        '<tr>'+
        '<td>'+result.order[i].ProductName+'</td>'+
        '<td>'+result.order[i].Qty+'</td>'+
        '<td>'+result.order[i].Status+'</td>'+
        '</tr>';
      }
      $('#orderTable').html(html);
    },
    error: function(result) {
      alert('error');
    }
  });
}

function GetDetailManagement(id) {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    url: "getDetailManagement?Id="+id,
    success: function(result) {
      var privilegesList = convertNumberToBinary(result.detail.Privilleges);
      $("#detailAccountManagement").modal('show');
      $('#fullnameManagement').val(result.detail.Fullname);
      $('#emailManagement').val(result.detail.Email);
      $('#managementImage').attr('src', result.detail.Image);
      $('#idManagement').val(result.detail.Id);
      $('#home').prop('checked', parseInt(privilegesList[0]));
      $('#accountManagement').prop('checked', parseInt(privilegesList[1]));
      $('#stockManagement').prop('checked', parseInt(privilegesList[2]));
      $('#salesManagement').prop('checked', parseInt(privilegesList[3]));
      $('#reporting').prop('checked', parseInt(privilegesList[4]));
    },
    error: function(result) {
      alert('error');
    }
  });
}

function Checker(element){
  var result;
  if($("#"+element).is(':checked')){
    result = 1;
  } else{
    result = 0;
  }
  return result.toString();
}


function UpdateAccountManagement() {
  var summary =  parseInt((Checker('reporting') + Checker('salesManagement') + Checker('stockManagement') + Checker('accountManagement') + Checker('home')),2);
  var urls = "updateAccountManagement?Id="+$("#idManagement").val()+"&Privilleges="+summary
  $("#detailAccountManagement").modal('hide');
  $.ajax({
    type: "POST",
    dataType : "JSON",
    url: urls ,
    success: function(result) {
      notify('fa fa-user', result.title, result.message, result.type);
      $('#order').val(0);
      getAccount();
    },
    error: function(result) {
      alert('err');
    }
  });
}

function insertAccountManagement() {
  var urls = 'addAccountManagement';
  var summary = parseInt((Checker('addReporting') + Checker('addSalesManagement') + Checker('addStockManagement') + Checker('addAccountManagement') + Checker('addHome')),2);
  $.ajax({
    type: "POST",
    dataType : "JSON",
    url: urls,
    data : {
      Email : $("#addEmailManagement").val(),
      Privilleges : summary
    },
    success: function(result) {
      notify('fa fa-user', result.title, result.message, result.status);
      $('#order').val(0);
      getAccount()
    },
    error: function(result) {
      alert('err');
    }
  });
}

const convertNumberToBinary = number => {
  return (number >>> 0).toString(2);
}
