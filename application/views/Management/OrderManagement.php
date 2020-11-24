<div class="panel-header bg-<?php echo $webConf->theme_color ?>-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Pembelian</h2>
      </div>
      <div class="ml-md-auto py-2 py-md-0">
      </div>
    </div>
  </div>
</div>
<div class="page-navs bg-white">
  <div class="nav-scroller">
    <div class="nav nav-tabs nav-line nav-color-secondary d-flex align-items-center justify-contents-center w-100">
      <a class="nav-link active show" data-toggle="tab" href="#tab1">Pesanan</a>
      <a class="nav-link" data-toggle="tab"  href="#tab2">Laporan Penjualan  </a>
    </div>
  </div>
</div>
<div class="card">
  <div class="tab-content mt-2 mb-3" >
    <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
      <div class="card-body row">
        <div class="col-md-12">
        <table  class="display datatable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Produk</th>
                <th>Model</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Pengiriman</th>
                <th>Status</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody id="allData">
            </tbody>
          </table>        
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="tab2" role="tabpanel" >
    <div class="card-body row">
        <div class="col-md-12">
        <table  class="display datatable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Produk</th>
                <th>Model</th>
                <th>Status</th>
                <th>Qty</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody id="salesData">
            </tbody>
          </table>        
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="confirmDeliveryModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4>Konfirmasi Pengiriman</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post">
        <div class="modal-body">

          <div class="tab-content">
            <div class="tab-pane active" id="">
              <div class="row">
                <div class="form-group col-md-12 ">
                  <input type="text" class="form-control" id="orderId" hidden>
                  <label>Nomor AWB</label>
                  <input type="text" class="form-control" id="awb" >
                </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="confirmDelivery()">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              </div>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>