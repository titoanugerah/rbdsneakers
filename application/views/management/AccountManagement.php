<div class="panel-header bg-<?php echo $webConf->theme_color ?>-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Akun</h2>
        <h5 class="text-white op-7 mb-2"> Halaman panel pengelolaan Akun</h5>
      </div>
      <div class="ml-md-auto py-2 py-md-0">
        <a href="<?php echo base_url('accountManagement/'.((int)$this->session->userdata['page']-1)); ?>" class="btn btn-success btn-round" <?php if($this->session->userdata['page']==0){echo 'hidden';}?>>Sebelumnya</a>
        <a href="<?php echo base_url('accountManagement/'.((int)$this->session->userdata['page']+1)); ?>" class="btn btn-success btn-round">Selanjutnya</a>
      </div>
    </div>
  </div>
</div>
<div class="page-navs bg-white">
  <div class="nav-scroller">
    <div class="nav nav-tabs nav-line nav-color-secondary d-flex align-items-center justify-contents-center w-100">
      <a class="nav-link active show" data-toggle="tab" href="#tab1">Akun Pelanggan</a>
      <a class="nav-link mr-5" data-toggle="tab" href="#tab2">Akun Manajemen</a>
    </div>
  </div>
</div>
<div class="card">
  <div class="tab-content mt-2 mb-3" >
    <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
      <div class="card-body row">
        <?php foreach ($customer as $customer) : ?>
          <div class="col-sm-6 col-lg-3">
            <div class="card">
              <div class="p-2">
                <img class="card-img-top rounded" src="<?php echo $customer->Image;?>">
              </div>
              <div class="card-body pt-2">
                <h4 class="mb-1 fw-bold"><?php echo $customer->Fullname; ?></h4>
                <br>
                <center>
                  <button type="button" class="btn btn-secondary btn-round" onclick="GetDetailCustomer(<?php echo $customer->Id; ?>)">Detail</button>
                </center>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="tab-pane fade show" id="tab2" role="tabpanel" >
      <div class="card-body row">
        <?php foreach ($management as $management) : ?>
          <div class="col-sm-6 col-lg-3">
            <div class="card">
              <div class="p-2">
                <img class="card-img-top rounded" src="<?php echo $management->Image;?>">
              </div>
              <div class="card-body pt-2">
                <h4 class="mb-1 fw-bold"><?php echo $management->Fullname; ?></h4>
                <br>
                <center>
                  <button type="button" class="btn btn-secondary btn-round" onclick="GetDetailManagement(<?php echo $customer->Id; ?>)">Detail</button>
                </center>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="detailAccount" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4>Detail Account</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post">
        <div class="modal-body">
          <ul class="wizard-menu nav nav-pills nav-primary">
            <li class="step" style="width: 50%;">
              <a class="nav-link active" href="#about" data-toggle="tab" aria-expanded="true"><i class="fa fa-user mr-0"></i> Detail Pelanggan</a>
            </li>
            <li class="step" style="width: 50%;">
              <a class="nav-link" href="#order" data-toggle="tab"><i class="fa fa-file mr-2"></i> Detail Order</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="about">
              <div class="row">
                <div class="avatar-xl col-md-2">
                  <br>
                  <img src="" id="customerImage" class="avatar-img rounded">
                </div>
                <div class="form-group col-6 col-md-4">
                  <label>Nama Pelanggan</label>
                  <input type="text" class="form-control" id="fullname" required>
                </div>
                <div class="form-group col-6 col-md-6">
                  <label>Email</label>
                  <input type="email" class="form-control" id="email" required>
                </div>
            </div>
          </div>
          <div class="tab-pane" id="order">
            <table id="table1" class="display">
              <thead>
                  <tr>
                      <th>Nama Produk</th>
                      <th>Qty</th>
                      <th>Status</th>
                  </tr>
              </thead>
              <tbody id="orderTable">

              </tbody>
            </table>
          </div>
        </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="detailAccountManagement" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4>Detail Account</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post">
        <div class="modal-body">
          <ul class="wizard-menu nav nav-pills nav-primary">
            <li class="step" style="width: 50%;">
              <a class="nav-link active" href="#aboutManagement" data-toggle="tab" aria-expanded="true"><i class="fa fa-user mr-0"></i> Detail Karyawan</a>
            </li>
            <li class="step" style="width: 50%;">
              <a class="nav-link" href="#privilegesList" data-toggle="tab"><i class="fa fa-file mr-2"></i> Daftar Hak Akses</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="aboutManagement">
              <div class="row">
                <div class="avatar-xl col-md-2">
                  <br>
                  <img src="" id="ManagementImage" class="avatar-img rounded">
                </div>
                <div class="form-group col-6 col-md-4">
                  <label>Nama Karyawan</label>
                  <input type="text" class="form-control" id="fullnameManagement" required>
                </div>
                <div class="form-group col-6 col-md-6">
                  <label>Email</label>
                  <input type="email" class="form-control" id="emailManagement" required>
                </div>
            </div>
          </div>
          <div class="tab-pane" id="privilegesList">
            <div class="selectgroup selectgroup-pills">
							<label class="selectgroup-item">
								<input type="checkbox" name="value" value="HTML" class="selectgroup-input" checked="">
								<span class="selectgroup-button">HTML</span>
							</label>
							<label class="selectgroup-item">
								<input type="checkbox" name="value" value="CSS" class="selectgroup-input">
								<span class="selectgroup-button">CSS</span>
							</label>
							<label class="selectgroup-item">
								<input type="checkbox" name="value" value="PHP" class="selectgroup-input">
								<span class="selectgroup-button">PHP</span>
							</label>
							<label class="selectgroup-item">
								<input type="checkbox" name="value" value="JavaScript" class="selectgroup-input">
								<span class="selectgroup-button">JavaScript</span>
							</label>
							<label class="selectgroup-item">
								<input type="checkbox" name="value" value="Ruby" class="selectgroup-input">
								<span class="selectgroup-button">Ruby</span>
							</label>
							<label class="selectgroup-item">
								<input type="checkbox" name="value" value="Ruby" class="selectgroup-input">
								<span class="selectgroup-button">Ruby</span>
							</label>
							<label class="selectgroup-item">
								<input type="checkbox" name="value" value="C++" class="selectgroup-input">
								<span class="selectgroup-button">C++</span>
							</label>
						</div>
          </div>
        </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  function GetDetailCustomer(id) {
    $.ajax({
        type: "POST",
        dataType : "JSON",
        url: "<?php echo base_url() ?>/getDetailCustomer?Id="+id,
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
        url: "<?php echo base_url() ?>/GetDetailManagement?Id="+id,
        success: function(result) {
          $("#detailAccountManagement").modal('show');
          $('#fullnameManagement').val(result.detail.Fullname);
          $('#emailManagement').val(result.detail.Email);
          $('#ManagementImage').attr('src', result.detail.Image);

        },
        error: function(result) {
            alert('error');
        }
    });
  }

</script>
