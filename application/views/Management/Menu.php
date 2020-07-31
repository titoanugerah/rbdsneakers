<li class="nav-item" >
  <a href="<?php echo base_url('dashboard'); ?>">
    <i class="fas fa-home"></i>
    <p>Dashboard</p>
  </a>
</li>

<li class="nav-item" <?php if(!$this->session->userdata['AccountManagement']){echo 'hidden';} ?>>
  <a href="<?php echo base_url('accountManagement'); ?>">
    <i class="fas fa-user"></i>
    <p>Kelola Akun</p>
  </a>
</li>

<li class="nav-item <?php if(!$this->session->userdata['StockManagement']){echo 'hidden';} ?>">
  <a data-toggle="collapse" href="#StockManagementMenu" class="collapsed" aria-expanded="false">
    <i class="fas fa-box"></i>
    <p>Kelola Barang</p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="StockManagementMenu">
    <ul class="nav nav-collapse">
      <li>
        <a href="<?php echo base_url('categoryManagement'); ?>">
          <span class="sub-item">Kategori Produk</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url('productManagement'); ?>">
          <span class="sub-item">Produk</span>
        </a>
      </li>

    </ul>
  </div>
</li>

<li class="nav-item" <?php if(!$this->session->userdata['SalesManagement']){echo 'hidden';} ?>>
  <a href="<?php echo base_url('webManagement'); ?>">
    <i class="fas fa-quote-left"></i>
    <p>Identitas Web</p>
  </a>
</li>
