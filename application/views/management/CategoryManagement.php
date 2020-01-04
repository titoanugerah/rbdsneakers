<div class="panel-header bg-<?php echo $webConf->theme_color ?>-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Kategori</h2>
        <h5 class="text-white op-7 mb-2"> Halaman panel pengelolaan Kategori</h5>
      </div>
    </div>
  </div>
</div>

<div class="card-body row">
  <?php foreach ($category as $category) : ?>
    <div class="col-sm-6 col-lg-3">
      <div class="card">
        <div class="p-2">
          <img class="card-img-top rounded" src="<?php echo base_url('./assets/picture/'.$category->Image);?>" style="width:200px; height: 200px">
        </div>
        <div class="card-body pt-2">
          <h4 class="mb-1 fw-bold"><?php echo $category->Name; ?></h4>
          <br>
          <center>
            <button type="button" class="btn btn-secondary btn-round" onclick="GetDetailCategory(<?php echo $category->Id; ?>)">Detail</button>
          </center>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>


<div class="modal fade" id="detailCategory" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4>Detail Kategori Produk</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post">
        <div class="modal-body">
          <ul class="wizard-menu nav nav-pills nav-primary">
            <li class="step" style="width: 50%;">
              <a class="nav-link active" href="#aboutCategory" data-toggle="tab" aria-expanded="true"><i class="fa fa-user mr-0"></i> Detail Kategori</a>
            </li>
            <li class="step" style="width: 50%;">
              <a class="nav-link" href="#productList" data-toggle="tab"><i class="fa fa-file mr-2"></i> Daftar Produk</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="aboutCategory">
              <div class="row">
                <div class="avatar-xl col-md-2">
                  <br>
                  <img src="" id="imageCategory" class="avatar-img rounded" >
                </div>
                <div class="form-group col-6 col-md-4">
                  <label>Nama Kategori</label>
                  <input type="text" class="form-control" id="nameCategory" required>
                  <input type="text" class="form-control" id="idCategory" hidden>
                </div>
                <div class="form-group col-6 col-md-6">
                  <label>Deskripsi</label>
                  <textarea id="descriptionCategory" rows="2" cols="80" class="form-control"></textarea>
                </div>
            </div>
          </div>
          <div class="tab-pane" id="productList">
            <table id="table1" class="display">
              <thead>
                  <tr>
                      <th>Nama Produk</th>
                  </tr>
              </thead>
              <tbody id="productTableList">

              </tbody>
            </table>
          </div>
        </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="UpdateCategory()">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addManagement" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4>Tambah Akun</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post">
        <div class="modal-body">
          <ul class="wizard-menu nav nav-pills nav-primary">
            <li class="step" style="width: 50%;">
              <a class="nav-link active" href="#dataManagement" data-toggle="tab" aria-expanded="true"><i class="fa fa-user mr-0"></i> Detail Karyawan</a>
            </li>
            <li class="step" style="width: 50%;">
              <a class="nav-link" href="#addPrivilegesList" data-toggle="tab"><i class="fa fa-file mr-2"></i> Daftar Hak Akses</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="dataManagement">
              <div class="row">
                <div class="form-group col-6 col-md-12">
                  <label>Email</label>
                  <input type="email" class="form-control" id="addEmailManagement" placeholder="silahkan masukan email disini" required>
                </div>
            </div>
          </div>
          <div class="tab-pane" id="addPrivilegesList">
            <br><br>
            <div class="selectgroup selectgroup-pills">
							<label class="selectgroup-item">
								<input type="checkbox" id="addHome"  value="1" class="selectgroup-input" checked disabled>
								<span class="selectgroup-button">Halaman Depan</span>
							</label>
							<label class="selectgroup-item">
								<input type="checkbox" id="addCategoryManagement" value="1" class="selectgroup-input">
								<span class="selectgroup-button">Manajemen Akun</span>
							</label>
							<label class="selectgroup-item">
								<input type="checkbox" id="addStockManagement" value="1" class="selectgroup-input">
								<span class="selectgroup-button">Manajemen Stok</span>
							</label>
              <br><br>
							<label class="selectgroup-item">
								<input type="checkbox" id="addSalesManagement" value="1" class="selectgroup-input">
								<span class="selectgroup-button">Manajemen Penjualan</span>
							</label>
							<label class="selectgroup-item">
								<input type="checkbox" id="addReporting" value="1" class="selectgroup-input">
								<span class="selectgroup-button">Laporan </span>
							</label>
						</div>
          </div>
        </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="insertCategoryManagement()">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function GetDetailCategory(id) {
    $.ajax({
        type: "POST",
        dataType : "JSON",
        data: {Id: id},
        url: "<?php echo base_url() ?>/getDetailCategory",
        success: function(result) {
          console.log(result);
          $("#detailCategory").modal('show');
          $('#nameCategory').val(result.detail.Name);
          $('#idCategory').val(result.detail.Id);
          $('#descriptionCategory').val(result.detail.Description);
          $('#imageCategory').attr('src', "<?php echo base_url('assets/picture/'); ?>"+result.detail.Image);
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

  function UpdateCategory() {
  $("#detailCategoryManagement").modal('hide');
    $.ajax({
        type: "POST",
        dataType : "JSON",
        data : {
          Id: $('#idCategory').val(),
          Name: $('#nameCategory').val(),
          Description : $('#descriptionCategory').val()
        },
        url: "<?php echo base_url() ?>/updateCategory",
        success: function(result) {
         notify('fa fa-user', result.title, result.message, result.type);
        },
        error: function(result) {
            console.log(result);
          alert('err');
        }
    });
  }

  function insertCategory() {
    var urls = '<?php echo base_url("addCategoryManagement"); ?>';
    var summary = parseInt((checker('addReporting') + checker('addSalesManagement') + checker('addStockManagement') + checker('addCategoryManagement') + checker('addHome')),2);
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
        },
        error: function(result) {
            console.log(result);
          alert('err');
        }
    });
  }

  const convertNumberToBinary = number => {
    return (number >>> 0).toString(2);
  }

</script>
