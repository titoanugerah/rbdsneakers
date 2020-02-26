<div class="panel-header bg-<?php echo $webConf->theme_color ?>-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Web</h2>
        <h5 class="text-white op-7 mb-2"> Halaman panel pengelolaan Web</h5>
      </div>
      <div class="ml-md-auto py-2 py-md-0">
      </div>
    </div>
  </div>
</div>
<div class="page-navs bg-white">
  <div class="nav-scroller">
    <div class="nav nav-tabs nav-line nav-color-secondary d-flex align-items-center justify-contents-center w-100">
      <a class="nav-link active show" data-toggle="tab" href="#tab1">Informasi Perusahaan</a>
      <a class="nav-link" data-toggle="tab" href="#tab2">Akun Media Sosial </a>
      <a class="nav-link" data-toggle="tab" href="#tab3">Konfigurasi Email </a>
      <a class="nav-link" data-toggle="tab" href="#tab4">Pembayaran</a>
      <a class="nav-link" data-toggle="tab" href="#tab5">Tentang Perusahaan</a>
    </div>
  </div>
</div>
<div class="card">
  <div class="tab-content mt-2 mb-3" >
    <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
      <div class="card-body row">
        <div class="col-10">
          <div class="row">
            <div class="form-group col-3">
              <label>Nama Brand</label>
              <input type="text" class="form-control" id="brandName"  >
            </div>
            <div class="form-group col-9">
              <label>Slogan</label>
              <input type="text" class="form-control" id="brandSlogan"  >
            </div>
            <div class="form-group col-4">
              <label>Nama Perusahaan</label>
              <input type="text" class="form-control" id="officeName"  >
            </div>
            <div class="form-group col-4">
              <label>Alamat Perusahaan</label>
              <input type="text" class="form-control" id="officeAddress"  >
            </div>
            <div class="form-group col-4">
              <label>Link Peta</label>
              <input type="text" class="form-control" id="officeMap"  >
            </div>
          </div>
        </div>
        <div class="col-2">
          <div class="input-file input-file-image">
            <label>Gambar</label>
            <img class="img-upload-preview" width="150" src="http://placehold.it/150x150" alt="preview" id="brandLogo">
            <input type="file" class="form-control form-control-file" id="fileUpload" name="fileUpload" accept="image/*" required="">
            <label for="fileUpload" class="  label-input-file btn btn-success">
              <span class="btn-label">
                <i class="fa fa-file-image"></i>
              </span>
              Upload Foto
            </label>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="tab2" role="tabpanel" >
      <div class="card-body row">
        <div class="form-group col-6">
          <label>Nomor Telepon</label>
          <input type="text" class="form-control" id="officePhoneNumber"  >
        </div>
        <div class="form-group col-6">
          <label>Email</label>
          <input type="email" class="form-control" id="officeEmail"  >
        </div>
        <div class="form-group col-4">
          <label>Twitter</label>
          <input type="text" class="form-control" id="officialTwitter"  >
        </div>
        <div class="form-group col-4">
          <label>Facebook</label>
          <input type="text" class="form-control" id="officialFacebook"  >
        </div>
        <div class="form-group col-4">
          <label>Instagram</label>
          <input type="text" class="form-control" id="officialInstagram"  >
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="tab3" role="tabpanel" >
      <div class="card-body row">
        <div class="form-group col-3">
          <label>Email</label>
          <input type="email" class="form-control" id="emailAddress"  >
        </div>
        <div class="form-group col-3">
          <label>Host</label>
          <input type="text" class="form-control" id="emailHost"  >
        </div>
        <div class="form-group col-3">
          <label>password</label>
          <input type="password" class="form-control" id="emailPassword"  >
        </div>
        <div class="form-group col-2">
          <label>Port</label>
          <input type="number" class="form-control" id="emailPort"  >
        </div>
        <div class="form-group col-1">
          <label>Crypto</label>
          <input type="text" class="form-control" id="emailCrypto"  >
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="tab4" role="tabpanel" >
      <div class="card-body row">
        <div class="form-group col-4">
          <label>Nama Bank</label>
          <input type="text" class="form-control" id="bankName"  >
        </div>
        <div class="form-group col-4">
          <label>Nomor Rekening</label>
          <input type="text" class="form-control" id="bankAccount"  >
        </div>
        <div class="form-group col-4">
          <label>Nama Nasabah</label>
          <input type="text" class="form-control" id="bankOwner"  >
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="tab5" role="tabpanel" >
      <div class="card-body">
        this is tab 5
      </div>
    </div>
    <div class="card-footer">
      <button type="button" onclick="UpdateWebConf()" class="btn btn-success">Simpan</button>
    </div>
  </div>
</div>
