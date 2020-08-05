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
      <a class="nav-link active show" data-toggle="tab" onclick="ChangeBtn('WebConf')" href="#tab1">Semua</a>
      <a class="nav-link" data-toggle="tab" onclick="ChangeBtn('WebConf')" href="#tab2">Menunggu Konfirmasi Pembayaran </a>
      <a class="nav-link" data-toggle="tab" onclick="ChangeBtn('WebConf')" href="#tab3">Menunggu Pengiriman</a>
      <a class="nav-link" data-toggle="tab" onclick="ChangeBtn('WebConf')" href="#tab4">Pesanan Selesai</a>
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
                <th>Ukuran</th>
                <th>Harga</th>
                <th>Total</th>
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

      </div>
    </div>
  </div>
</div>
