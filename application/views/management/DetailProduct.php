<div class="panel-header bg-<?php echo $webConf->theme_color ?>-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Detail Produk</h2>
        <h5 class="text-white op-7 mb-2"> Halaman panel pengelolaan Akun</h5>
      </div>
      <div class="ml-md-auto py-2 py-md-0">
        <button type="button" id="addVariantButton" data-toggle="modal" data-target="#addVariantForm" class="btn btn-primary btn-round">Tambah Varian</button>
        <input type="number" id="idProduct" value="<?php echo $id; ?>" hidden>
      </div>
    </div>
  </div>
</div>
<div class="page-navs bg-white">
  <div class="nav-scroller">
    <div class="nav nav-tabs nav-line nav-color-secondary d-flex align-items-center justify-contents-center w-100">
      <a class="nav-link active show" data-toggle="tab" href="#tab1">Informasi Umum</a>
      <a class="nav-link" data-toggle="tab" href="#tab2">Varian</a>
      <a class="nav-link" data-toggle="tab" href="#tab3">Review</a>
      <a class="nav-link" data-toggle="tab" href="#tab4">Hapus</a>
    </div>
  </div>
</div>
<div class="card">
  <div class="tab-content mt-2 mb-3" >
    <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
      <div class="card-body row" id="data1">
        <div class="form-group col-6 col-md-5">
          <label>Nama Produk</label>
          <input type="text" class="form-control" id="nameProduct"  >
        </div>
        <div class="form-group col-6 col-md-3">
          <label>Harga</label>
          <input type="number" class="form-control" id="priceProduct"  >
        </div>
        <div class="form-group col-6 col-md-4">
          <label>Kategori</label>
          <br>
          <select class="select2basic" id="categoryIdProduct" style="width:330px" value=9></select>
        </div>
        <div class="form-group col-md-10" >
          <label>Keterangan</label>
          <textarea id="descriptionProduct" rows="9" cols="80" class="form-control"></textarea>
        </div>
        <div class="form-group col-md-2">
          <div class="input-file input-file-image">
            <label>Gambar</label>
            <img class="img-upload-preview" width="150" src="http://placehold.it/150x150" alt="preview" id="imageProduct">
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
      <div class="card-footer">
        <button type="button" class="btn btn-primary" onclick="UpdateProduct()">Simpan</button>
        <button type="button" class="btn btn-secondary"> Kembali</button>
      </div>
    </div>
    <div class="tab-pane fade show" id="tab2" role="tabpanel" >
      <div class="card-body row" id="data2">

      </div>
    </div>
    <div class="tab-pane fade show" id="tab3" role="tabpanel" >
      <div class="card-body row" id="data2">
        tab 3
      </div>
    </div>
    <div class="tab-pane fade show" id="tab4" role="tabpanel" >
      <div class="card-body row" id="data2">
        tab 4
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="addVariantForm" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4>Tambah Produk</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <ul class="wizard-menu nav nav-pills nav-primary">
            <li class="step" style="width: 50%;">
              <a class="nav-link active" href="#addNewProduct" data-toggle="tab" aria-expanded="true"><i class="fas fa-plus-circle mr-0"></i> Tambah Baru</a>
            </li>
            <li class="step" style="width: 50%;">
              <a class="nav-link" href="#recoverProduct" data-toggle="tab"><i class="fa fa-history mr-2"></i>Pulihkan Produk</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="addNewProduct">
              <div class="row">

                <div class="form-group col-6 col-md-7">
                  <label>Model</label>
                  <input type="text" class="form-control" id="addModelVariant"  >
                  <br>
                  <label>Warna</label>
                  <input type="text" class="form-control" id="addColorVariant"  >
                </div>
                <div class="form-group col-md-5">
                  <div class="input-file input-file-image">
                    <label>Gambar</label>
                    <img class="img-upload-preview" width="150" src="http://placehold.it/150x150" alt="preview">
                    <input type="file" class="form-control form-control-file" id="fileUpload2" name="fileUpload2" accept="image/*" required="">
                    <label for="fileUpload2" class="  label-input-file btn btn-success">
                      <span class="btn-label">
                        <i class="fa fa-file-image"></i>
                      </span>
                      Upload Foto
                    </label>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="ProceedAddVariant()">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              </div>
            </div>
            <div class="tab-pane" id="recoverProduct">
              <div class="form-group">
                <label>Pilih Produk Terhapus</label>
                &nbsp;&nbsp;&nbsp;
                <select class="select2basic" id="idRecoverVariant" style="width:250px;">

                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="ProceedRecoverVariant()">Pulihkan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              </div>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
