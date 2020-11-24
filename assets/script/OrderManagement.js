$(document).ready(function(){
  getOrder();
  getSales();

    setTimeout(function(){
      $('.datatable').DataTable({
        "order": [[ 0, "desc" ]],
        dom: 'Bfrtip',
        buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print']  
      });

    }, 1500);
    
  });

  function confirmDeliveryForm(id) {
    $('#confirmDeliveryModal').modal('show');
    $('#orderId').val(id)
  }

  function  confirmDelivery(){

    $.ajax({
      type: "POST",
      dataType : "JSON",
      data : {
        Id : $('#orderId').val(),
        AWB : $('#awb').val()
      },
      url: "confirmDelivery",
      success: function(result) {
        console.log(result);
        getOrder();
    },
      error: function(result) {
        console.log(result);
        notify('fas fa-bell', 'Gagal', 'Terjadi masalah ketika memproses, kode error : '+result.status, 'danger');
      }
    });
  }


  function confirmPayment(id) {
    $.ajax({
      type: "POST",
      dataType : "JSON",
      data : {
        Id : id
      },
      url: "confirmPayment",
      success: function(result) {
        console.log(result);
        getOrder();
    },
      error: function(result) {
        console.log(result);
        notify('fas fa-bell', 'Gagal', 'Terjadi masalah ketika memproses, kode error : '+result.status, 'danger');
      }
    });
  }
  

  function getOrder() {
      $.ajax({
        type: "POST",
        dataType : "JSON",
        url: "getDetailOrder",
        success: function(result) {
          console.log(result);
          var html1= "";
          var no = 1;
          result.forEach(function(data){
              var btns = '';
              var stat = '';
              var deliveryDestination = data.CustomerName+', '+data.DeliveryAddress+', '+data.CustomerPhone;
              if(data.Status == 0){
                  btns ='<button class="btn btn-warning" onclick="confirmPayment('+data.OrderId+')">Konfirmasi Pembayaran</button>';
                  stat = 'Menunggu konfirmasi pembayaran';
                } else if(data.Status==1){
                  btns ='<button class="btn btn-primary" onclick="confirmDeliveryForm('+data.OrderId+')">Konfirmasi Pengiriman</button>';
                  stat = 'Pembayaran dikonfirmasi, menunggu pengiriman';
                } else {
                  stat = 'Pesanan terkirim';

                }

              html1 =
              '<tr>' +
              '<td>'+data.OrderId+'</td>' +
              '<td>'+data.Product+'</td>' +
              '<td>'+data.Model+' '+data.Color+' ukuran '+data.Size+'</td>' +
              '<td>'+data.Price+'</td>' +
              '<td>'+data.Total+'</td>' +
              '<td>'+deliveryDestination+'</td>' +
              '<td>'+stat+'</td>' +
              '<td> '+btns+'</td>' +
              '</tr>' + html1;    
              no++;
          });
  
          $('#allData').html(html1);
        },
        error: function(result) {
          console.log(result);
          notify('fas fa-bell', 'Gagal', 'Terjadi masalah ketika memproses, kode error : '+result.status, 'danger');
        }
      });
    }

    function getSales() {
      $.ajax({
        type: "POST",
        dataType : "JSON",
        url: "getSalesReport",
        success: function(result) {
          console.log(result);
          var html1= "";
          
          var no = 1;
          result.forEach(function(data){
              if(data.Status == 0){
                btns ='<button class="btn btn-warning" onclick="confirmPayment('+data.OrderId+')">Konfirmasi Pembayaran</button>';
                stat = 'Menunggu konfirmasi pembayaran';
              } else if(data.Status==1){
                btns ='<button class="btn btn-primary" onclick="confirmDeliveryForm('+data.OrderId+')">Konfirmasi Pengiriman</button>';
                stat = 'Pembayaran dikonfirmasi, menunggu pengiriman';
              } else {
                stat = 'Pesanan terkirim';
    
              }
              html1 =
              '<tr>' +
              '<td>'+no+'</td>' +
              '<td>'+data.Product+'</td>' +
              '<td>'+data.Variant+'</td>' +
              '<td>'+stat+'</td>' +
              '<td>'+data.qty+'</td>' +
              '<td>'+data.total+'</td>' +
              '</tr>' + html1;    
              no++;
          });
  
          $('#salesData').html(html1);
        },
        error: function(result) {
          console.log(result);
          notify('fas fa-bell', 'Gagal', 'Terjadi masalah ketika memproses, kode error : '+result.status, 'danger');
        }
      });
    }
    
