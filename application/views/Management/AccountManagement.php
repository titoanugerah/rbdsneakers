<div class="panel-header bg-<?php echo $webConf->theme_color ?>-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Akun</h2>
        <h5 class="text-white op-7 mb-2"> Halaman panel pengelolaan Akun</h5>
      </div>
      <div class="ml-md-auto py-2 py-md-0">
        <input type="number" id="order" value="0" hidden>
        <button type="button" data-toggle="modal" data-target="#addManagement" class="btn btn-round btn-success btn-border" >Tambah Karyawan</button>
        <button type="button" class="btn btn-round btn-primary" onclick="PreviousPage()">Sebelumnya</button>
        <button type="button" class="btn btn-round btn-primary" onclick="NextPage()">Selanjutnya</button>
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

  <div class="tab-content mt-2 mb-3" >
    <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
      <div class="card-body row" id="data1">
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
      <div class="card-body row" id="data2">
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
                  <button type="button" class="btn btn-secondary btn-round" onclick="GetDetailManagement(<?php echo $management->Id; ?>)">Detail</button>
                </center>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

<div class="modal fade" id="detailAccount" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4>Detail Akun</h4>
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
          <h4>Detail Akun</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post">
        <div class="modal-body">
          <ul class="wizard-menu nav nav-pills nav-primary">
            <li class="step" style="width: 33%;">
              <a class="nav-link active" href="#aboutManagement" data-toggle="tab" aria-expanded="true"><i class="fa fa-user mr-0"></i> Detail Karyawan</a>
            </li>
            <li class="step" style="width: 33%;">
              <a class="nav-link" href="#privilegesList" data-toggle="tab"><i class="fa fa-file mr-2"></i> Daftar Hak Akses</a>
            </li>
            <li class="step" style="width: 33%;">
              <a class="nav-link" href="#deleteFromManagement" data-toggle="tab"><i class="fa fa-file mr-2"></i> Hapus Akun Ini</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="aboutManagement">
              <div class="row">
                <div class="avatar-xl col-md-2">
                  <br>
                  <img src="" id="managementImage" class="avatar-img rounded" >
                </div>
                <div class="form-group col-6 col-md-4">
                  <label>Nama Karyawan</label>
                  <input type="text" class="form-control" id="fullnameManagement" required>
                  <input type="text" class="form-control" id="idManagement" hidden>
                </div>
                <div class="form-group col-6 col-md-6">
                  <label>Email</label>
                  <input type="email" class="form-control" id="emailManagement" required>
                </div>
            </div>
            <div class="modal-footer">

            </div>
          </div>
          <div class="tab-pane" id="privilegesList">
            <br><br>
            <div class="selectgroup selectgroup-pills">
							<label class="selectgroup-item">
								<input type="checkbox" id="home"  value="1" class="selectgroup-input" checked>
								<span class="selectgroup-button">Halaman Depan</span>
							</label>
							<label class="selectgroup-item">
								<input type="checkbox" id="accountManagement" value="1" class="selectgroup-input">
								<span class="selectgroup-button">Manajemen Akun</span>
							</label>
							<label class="selectgroup-item">
								<input type="checkbox" id="stockManagement" value="1" class="selectgroup-input">
								<span class="selectgroup-button">Manajemen Stok</span>
							</label>
							<label class="selectgroup-item">
								<input type="checkbox" id="salesManagement" value="1" class="selectgroup-input">
								<span class="selectgroup-button">Manajemen Penjualan</span>
							</label>
							<label class="selectgroup-item">
								<input type="checkbox" id="reporting" value="1" class="selectgroup-input">
								<span class="selectgroup-button">Laporan </span>
							</label>
						</div>
            <br><br>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" onclick="UpdateAccountManagement()">Simpan</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
          </div>
          <div class="tab-pane" id="deleteFromManagement">
            <br><br>
            <div class="card-body card-primary">
              <p>Dengan menghapus akun maka, akun akan dikembalikan ke akun pelanggan</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" onclick="DeleteAccountManagement()">Hapus Akun</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>

          </div>
        </div>
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
								<input type="checkbox" id="addAccountManagement" value="1" class="selectgroup-input">
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
          <button type="button" class="btn btn-primary" onclick="insertAccountManagement()">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        </div>
      </form>
    </div>
  </div>
</div>
