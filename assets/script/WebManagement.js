$(document).ready(function() {
  $('.select2basic').select2();
  $('#search').attr('placeholder', 'Feature Not Available');
  $('#search').attr('disabled', true);
  GetWebConf();
  $('#summernote').summernote({
    placeholder: 'Type Here',
    tabsize: 2,
    height: 100
  });
});

function ChangeBtn(tab) {
  if (tab=="WebConf") {
    $('#saveBtn').attr('onclick', 'UpdateWebConf()');
  } else {
    $('#saveBtn').attr('onclick', 'UpdateAbout()');
  }
}

$( "#officeEmail" ).on('change', function() {
  $("#emailAddress").val($("#officeEmail").val());
});

$( "#emailAddress" ).on('change', function() {
  $("#officeEmail").val($("#emailAddress").val());
});


function GetWebConf() {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data: {
      Table: 'webconf',
      Variable : 'Id',
      Value : 1
    },
    url: "getWebConf",
    success: function(result) {
      console.log(result);
      var html='<button class="nav-link active show" onclick="DetailAbout(0)" data-toggle="pill" role="tab" aria-selected="true">Baru</button>';
      $("#brandName").val(result.detail.brand_name);
      $("#brandSlogan").val(result.detail.brand_slogan);
      $("#officeName").val(result.detail.office_name);
      $("#officeAddress").val(result.detail.office_address);
      $("#officeMap").val(result.detail.office_map);
      $("#brandLogo").attr('src', "assets/picture/"+result.detail.image);
      $("#officePhoneNumber").val(result.detail.office_phone_number);
      $("#officeEmail").val(result.detail.email);
      $("#officialTwitter").val(result.detail.official_twitter_account);
      $("#officialFacebook").val(result.detail.official_facebook_account);
      $("#officialInstagram").val(result.detail.official_instagram_account);
      $("#emailAddress").val(result.detail.email);
      $("#emailHost").val(result.detail.host);
      $("#emailPassword").val(result.detail.password);
      $("#emailPort").val(result.detail.port);
      $("#emailCrypto").val(result.detail.crypto);
      $("#bankName").val(result.detail.bank_name);
      $("#bankAccount").val(result.detail.bank_account);
      $("#bankOwner").val(result.detail.bank_user);
      for(i=0; i<result.about.length; i++){
        html +=
        '<button class="nav-link" onclick="DetailAbout('+result.about[i].Id+')" data-toggle="pill" role="tab" aria-selected="false">'+result.about[i].Title+'</button>';
      }
      $('#v-pills-tab').html(html);
    },
    error: function(result) {
      alert('error');
    }
  });
}

function UpdateAbout() {
  var urls;
  var id = $('#updateAboutId').val();
  if (id==0) {
    urls = 'addAbout';
  } else {
    urls = 'updateAbout';
  }
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data: {
      Id : id,
      Title : $('#updateAboutTitle').val(),
      Content :  $('#summernote').summernote("code"),
    },
    url: urls,
    success: function(result) {
        console.log('id', result);
        if (id==0) {
          GetWebConf();
        }
        UploadFile('fileUpload1', 'About', result.id);
        notify('fa fa-user', result.title, result.message, result.type);

    },
    error: function(result) {
      alert('error');
    }
  });
}


function DetailAbout(id) {
  $('#updateAboutId').val(id);
  if (id==0) {
    $('#summernote').summernote("code", "");
    $('#filePreview1').attr('src', 'assets/picture/no.jpg');
    $('#updateAboutId').val(0);
    $('#updateAboutTitle').val("");

  } else {
    $.ajax({
      type: "POST",
      dataType : "JSON",
      data: {
        Table: 'About',
        Variable : 'Id',
        Value : id
      },
      url: "getDetail",
      success: function(result) {
        console.log(result.detail.Content);
        $('#summernote').summernote("code", result.detail.Content);
        $('#filePreview1').attr('src', 'assets/picture/'+result.detail.Image);
        $('#updateAboutId').val(result.detail.Id);
        $('#updateAboutTitle').val(result.detail.Title);
      },
      error: function(result) {
        alert('error');
      }
    });
  }
}

function UploadFile(name, type, id) {
  var fd = new FormData();
  var files = $('#'+name)[0].files[0];
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
      console.log('upload error', result);
      alert('error');
    }
  });
}

function UpdateWebConf() {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data: {
      Table: 'WebConf',
      Variable : 'Id',
      Value : 1,
      brand_name : $("#brandName").val(),
      brand_slogan : $("#brandSlogan").val(),
      office_name : $("#officeName").val(),
      office_address : $("#officeAddress").val(),
      office_map : $("#officeMap").val(),
      office_phone_number : $("#officePhoneNumber").val(),
      email : $("#officeEmail").val(),
      official_twitter_account : $("#officialTwitter").val(),
      official_facebook_account : $("#officialFacebook").val(),
      official_instagram_account : $("#officialInstagram").val(),
      email : $("#emailAddress").val(),
      host : $("#emailHost").val(),
      password : $("#emailPassword").val(),
      port : $("#emailPort").val(),
      crypto : $("#emailCrypto").val(),
      bank_name : $("#bankName").val(),
      bank_account : $("#bankAccount").val(),
      bank_user : $("#bankOwner").val()
    },
    url: "updateWebConf",
    success: function(result) {
      UploadFile('fileUpload','WebConf', 1);
      notify('fa fa-user', result.title, result.message, result.type);
      GetWebConf();
    },
    error: function(result) {
      alert('error');
    }
  });
}
