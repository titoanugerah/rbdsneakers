<div class="panel-header bg-<?php echo $webConf->theme_color ?>-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Kategori</h2>
        <h5 class="text-white op-7 mb-2"> Halaman panel pengelolaan Kategori</h5>
      </div>
      <div class="ml-md-auto py-2 py-md-0">
        <button type="button" data-toggle="modal" data-target="#addCategory" class="btn btn-round btn-primary btn-border" >Tambah Kategori</button>
      </div>

    </div>
  </div>
</div>

<div class="card-body row" id="categoryList">

</div>


<div class="modal fade" id="detailCategory" role="dialog">
  <div class="modal-dialog">
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
            <li class="step" style="width: 33%;">
              <a class="nav-link active" href="#aboutCategory" data-toggle="tab" aria-expanded="true"><i class="fa fa-user mr-0"></i> Detail</a>
            </li>
            <li class="step" style="width: 33%;">
              <a class="nav-link" href="#productList" data-toggle="tab"><i class="fa fa-archive mr-2"></i>Produk</a>
            </li>
            <li class="step" style="width: 33%;">
              <a class="nav-link" href="#deleteCategory" data-toggle="tab"><i class="fas fa-trash mr-2"></i> Hapus</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="aboutCategory">
              <div class="row">
                <div class="form-group col-6 col-md-3">
                  <label>Nama Kategori</label>
                  <input type="text" class="form-control" id="nameCategory" >
                  <input type="text" class="form-control" id="idCategory" hidden>
                </div>
                <div class="form-group col-6 col-md-9">
                  <label>Deskripsi</label>
                  <textarea id="descriptionCategory" rows="2" cols="80" class="form-control"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="UpdateCategory()">Simpan</button>
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
            <div class="tab-pane" id="deleteCategory">
              <br>
              <div class="card-body card-warning">
								<div class="card-opening"><b>Peringatan</b></div>
								<div class="card-desc">
                  Anda akan menghapus kategori ini, silahkan masukan passowrd anda untuk memverifikasi tindakan anda
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
              <button type="button" class="btn btn-danger" onclick="deleteCategory()">Hapus Kategori</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addCategory" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4>Tambah Kategori</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post">
        <div class="modal-body">
          <div class="tab-content">
            <div class="row">
              <div class="form-group col-6 col-md-4">
                <label>Nama Kategori</label>
                <input type="text" class="form-control" id="addNameCategory"  >
              </div>
              <div class="form-group col-6 col-md-8">
                <label>Keterangan</label>
                <textarea id="addDescriptionCategory" rows="2" cols="80" class="form-control"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="proceedAddCategory()">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        </div>
      </form>
    </div>
  </div>
</div>
