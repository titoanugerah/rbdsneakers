<div class="panel-header bg-<?php echo $webConf->theme_color ?>-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Produk</h2>
        <h5 class="text-white op-7 mb-2"> Halaman panel pengelolaan Produk</h5>
      </div>
      <div class="ml-md-auto py-2 py-md-0">
        <button type="button" data-toggle="modal" data-target="#addProduct" class="btn btn-round btn-primary btn-border" >Tambah Produk</button>
        <button type="button" class="btn btn-round btn-primary" id="previousData" >Sebelumnya</button>
        <button type="button" class="btn btn-round btn-primary" id="nextData" >Selanjutnya</button>

      </div>

    </div>
  </div>
</div>

<div class="card-body row" id="productList">

</div>


<div class="modal fade" id="detailProduct" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4>Detail Produk</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post">
        <div class="modal-body">
          <ul class="wizard-menu nav nav-pills nav-primary">
            <li class="step" style="width: 33%;">
              <a class="nav-link active" href="#aboutProduct" data-toggle="tab" aria-expanded="true"><i class="fa fa-user mr-0"></i> Detail</a>
            </li>
            <li class="step" style="width: 33%;">
              <a class="nav-link" href="#productList" data-toggle="tab"><i class="fa fa-archive mr-2"></i>Produk</a>
            </li>
            <li class="step" style="width: 33%;">
              <a class="nav-link" href="#deleteProduct" data-toggle="tab"><i class="fas fa-trash mr-2"></i> Hapus</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="aboutProduct">
              <div class="row">
                <div class="form-group col-6 col-md-3">
                  <label>Nama Produk</label>
                  <input type="text" class="form-control" id="nameProduct" >
                  <input type="text" class="form-control" id="idProduct" hidden>
                </div>
                <div class="form-group col-6 col-md-9">
                  <label>Deskripsi</label>
                  <textarea id="descriptionProduct" rows="2" cols="80" class="form-control"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="updateProduct()">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
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
            <div class="tab-pane" id="deleteProduct">
              <br>
              <div class="card-body card-warning">
								<div class="card-opening"><b>Peringatan</b></div>
								<div class="card-desc">
                  Anda akan menghapus produk ini, silahkan masukan passowrd anda untuk memverifikasi tindakan anda
								</div>
							</div>
              <center>
              <div class="row">
                <div class="form-group col-5">
                  masukan email anda
                </div>
                <div class="form-group col-6">
                  <input type="email" class="form-control" id="emailUser" >
                </div>
              </div>
            </center>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" onclick="deleteProduct()">Hapus Produk</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addProduct" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4>Tambah Produk</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post">
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
                <div class="form-group col-6 col-md-4">
                  <label>Nama Produk</label>
                  <input type="text" class="form-control" id="addNameProduct"  >
                </div>
                <div class="form-group col-6 col-md-8">
                  <label>Keterangan</label>
                  <textarea id="addDescriptionProduct" rows="2" cols="80" class="form-control"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="proceedAddProduct()">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              </div>
            </div>
            <div class="tab-pane" id="recoverProduct">
              <div class="form-group">
                <label>Pilih Produk Terhapus</label>
                &nbsp;&nbsp;&nbsp;
                <select class="select2basic" id="idRecoverProduct" style="width:250px;">

                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="proceedRecoverProduct()">Pulihkan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              </div>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
