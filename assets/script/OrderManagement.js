$(document).ready(function(){
    getOrder();
});

setTimeout(function(){
    $('.datatable').DataTable({
      "order": [[ 0, "desc" ]],
      dom: 'Bfrtip',
      buttons: [
    'copy', 'csv', 'excel', 'pdf', 'print']  
    });
  }, 600)
  

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
                if(data.Status == 0){
                    btns ='<button class="btn btn-primary" onclick="confirmPayment('+data.OrderId+')">Konfirmasi Pembayaran</button>';
                } else if(data.Status==1){
                    btns ='<button class="btn btn-primary" onclick="confirmDelivery('+data.OrderId+')">Konfirmasi Pengiriman</button>';
                } 

                html1 =
                '<tr>' +
                '<td>'+no+'</td>' +
                '<td>'+data.Product+'</td>' +
                '<td>'+data.Model+data.Color+'</td>' +
                '<td>'+data.Size+'</td>' +
                '<td>'+data.Price+'</td>' +
                '<td>'+data.Total+'</td>' +
                '<td> '+btns+'</td>' +
                '</tr>' + html1;    
              
            });
    
            $('#allData').html(html1);
          },
          error: function(result) {
            console.log(result);
            notify('fas fa-bell', 'Gagal', 'Terjadi masalah ketika memproses, kode error : '+result.status, 'danger');
          }
        });
      }
    
