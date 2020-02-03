$(document).ready(function(){
  GetCategory();
});

function GetDetailProduct(){
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
      $('#categoryIdProduct').html(html);
    },
    error: function(result) {
      alert('error', url);
    }
  });
}
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
      $('#categoryIdProduct').html(html);
    },
    error: function(result) {
      alert('error', url);
    }
  });
}
