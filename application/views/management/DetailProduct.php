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

<div class="modal fade" id="updateVariantForm" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4>Detail Produk</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <ul class="wizard-menu nav nav-pills nav-primary">
            <li class="step" style="width: 33%;">
              <a class="nav-link active" href="#detailVariant" data-toggle="tab" aria-expanded="true"><i class="fas fa-list mr-0"></i> Detail</a>
            </li>
            <li class="step" style="width: 33%;">
              <a class="nav-link" href="#sizeVariant" data-toggle="tab"><i class="fas fa-ruler-vertical mr-2"></i>Stok</a>
            </li>
            <li class="step" style="width: 33%;">
              <a class="nav-link" href="#stockVariant" data-toggle="tab"><i class="fas fa-plus mr-2"></i>Tambah Stok</a>
            </li>

          </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="detailVariant">
              <div class="row">

                <div class="form-group col-6 col-md-7">
                  <label>Model</label>
                  <input type="text" class="form-control" id="updateModelVariant"  >
                  <input type="text" class="form-control" id="updateIdVariant" hidden >
                  <br>
                  <label>Warna</label>
                  <input type="text" class="form-control" id="updateColorVariant"  >
                </div>
                <div class="form-group col-md-5">
                  <div class="input-file input-file-image">
                    <label>Gambar</label>
                    <img class="img-upload-preview" width="150" src="http://placehold.it/150x150" id="imageVariant" alt="preview">
                    <input type="file" class="form-control form-control-file" id="fileUpload3" name="fileUpload3" accept="image/*" required="">
                    <label for="fileUpload3" class="  label-input-file btn btn-success">
                      <span class="btn-label">
                        <i class="fa fa-file-image"></i>
                      </span>
                      Upload Foto
                    </label>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="ProceedUpdateVariant()">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              </div>
            </div>
            <div class="tab-pane" id="sizeVariant">
              <div class="form-group row">
                <label class="form-group">Ukuran Sepatu</label>
                <input type="number" name="addSizeVariant" id="addSizeVariant" value="" class="form-control col-md-4">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" name="addSizeButton" onclick="ProceedAddSize()" class="btn btn-success">Tambah Ukuran</button>
              </div>
              <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-striped mt-3">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col" colspan="2">Ukuran</th>
                      <th scope="col" colspan="2">Stok</th>
                    </tr>
                  </thead>
                  <tbody id="sizeTableList">

                  </tbody>
                </table>
              </div>

            </div>
            <div class="tab-pane" id="stockVariant">
              <div class="form-group row">
                <select class="form-control" id="addStockSize" style="width:135px">

                </select>
                &nbsp;
                <input type="number" class="form-control col-md-5" placeholder="Jumlah Stok Barang" id="addStockQty">
                &nbsp;
                <button type="button" onclick="ProceedAddStock()" class="btn btn-success">Tambah Stok</button>
              </div>

              <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-striped mt-3">
                  <thead>
                    <tr>
                      <th scope="col" colspan="2">Ukuran</th>
                      <th scope="col" colspan="2">Stok</th>
                      <th scope="col" colspan="2">Tanggal</th>
                    </tr>
                  </thead>
                  <tbody id="stockTableList">

                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </form>
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
              <a class="nav-link active" href="#addNewVariant" data-toggle="tab" aria-expanded="true"><i class="fas fa-plus-circle mr-0"></i> Tambah Baru</a>
            </li>
            <li class="step" style="width: 50%;">
              <a class="nav-link" href="#recoverVariant" data-toggle="tab"><i class="fa fa-history mr-2"></i>Pulihkan Produk</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="addNewVariant">
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
            <div class="tab-pane" id="recoverVariant">
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

<style>
  .my-custom-scrollbar {
    position: relative;
    height: 200px;
    overflow: auto;
  }
  .table-wrapper-scroll-y {
    display: block;
  }
</style>
