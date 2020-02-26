$(document).ready(function() {
  $('.select2basic').select2();
  GetWebConf();
});

$( "#officeEmail" ).on('change', function() {
  console.log("Changed Email");
  $("#emailAddress").val($("#officeEmail").val());
});

$( "#emailAddress" ).on('change', function() {
  console.log("Changed Email");
  $("#officeEmail").val($("#emailAddress").val());
});

function GetWebConf() {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data: {
      Table: 'WebConf',
      Variable : 'Id',
      Value : 1
    },
    url: "getDetail",
    success: function(result) {
      console.log(result);
      $("#brandName").val(result.detail.brand_name);
      $("#brandSlogan").val(result.detail.brand_slogan);
      $("#officeName").val(result.detail.office_name);
      $("#officeAddress").val(result.detail.office_address);
      $("#officeMap").val(result.detail.office_map);
      if (result.detail.brand_logo != null) {
        $("#brandLogo").attr('src', result.detail.brand_logo);
      }
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

    },
    error: function(result) {
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
      password : ("#emailPassword").val(),
      port : $("#emailPort").val(),
      crypto : $("#emailCrypto").val(),
      bank_name : $("#bankName").val(),
      bank_account : $("#bankAccount").val(),
      bank_user : $("#bankOwner").val()
    },
    url: "update",
    success: function(result) {
      GetWebConf();
    },
    error: function(result) {
      alert('error');
    }
  });
}
