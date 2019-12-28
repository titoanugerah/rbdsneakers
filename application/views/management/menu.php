<li class="nav-item" <?php if(!$this->session->userdata['AccountManagement']){echo 'hidden';} ?>>
  <a href="<?php echo base_url('accountManagement'); ?>">
    <i class="fas fa-user"></i>
    <p>Akun</p>
  </a>
</li>
