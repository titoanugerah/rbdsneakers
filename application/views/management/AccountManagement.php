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
                  <!-- <a href="<?php echo base_url('detailAccount/'.$customer->Role.'/'.$customer->Id); ?>" class="btn btn-secondary btn-round">Detail Akun</a> -->
                  <button type="button" class="btn btn-secondary btn-round" onclick="GetDetailAccount(<?php echo $customer->Id; ?>)">Detail</button>
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
                  <a href="<?php echo base_url('detailAccount/'.$management->Role.'/'.$management->Id); ?>" class="btn btn-secondary btn-round">Detail Akun</a>
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
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4>Detail Account</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post">
        <div class="modal-body row">
          <div class="form-group col-6 col-md-6">
            <label>Nama Promo</label>
            <input type="text" class="form-control" placeholder="Masukan nama promo" name="name" required>
          </div>
          <div class="form-group col-6 col-md-6">
            <label>Kode Promo</label>
            <input type="text" class="form-control" placeholder="Masukan kode promo" name="promo_code" required>
          </div>
          <div class="form-group col-6 col-md-12">
            <label>Deskripsi</label>
            <textarea name="description" rows="3" cols="80" placeholder="Masukan keterangan promo" class="form-control" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="createPromo" value="createPromo">Tambah Promo</button>
          <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  function GetDetailAccount(id) {
//    $("#loading").modal('show');
    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>/getDetailAccount?Id="+id,
        success: function(result) {
          $("#detailAccount").modal('show');
          $("#closeLoading").click();
//          console.log(result);
//            alert(result);
        },
        error: function(result) {
            alert('error');
        }
    });
  }
</script>
