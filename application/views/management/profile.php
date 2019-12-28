<div class="panel-header bg-<?php echo $webConf->theme_color ?>-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Profil</h2>
        <h5 class="text-white op-7 mb-2"> <?php echo $this->session->userdata['Fullname']; ?></h5>
      </div>
    </div>
  </div>
</div>

<div class="page-inner mt--5">
  <div class="row">
    <div class="col-md-9">
      <div class="card">
        <form  method="post">
          <div class="card-header">
            <h4>Profil Pengguna</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="form-group col-6 col-md-3">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" placeholder="Masukan nama lengkap" name="Fullname" value="<?php echo $this->session->userdata['Fullname']; ?>" readonly>
              </div>

              <div class="form-group col-6 col-md-4">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Masukan email anda" name="Email" value="<?php echo $this->session->userdata['Email']; ?>" readonly>
              </div>

              <div class="form-group col-6 col-md-3">
                <label>Sebagai</label>
                <input type="text" class="form-control" value="<?php echo $this->session->userdata['Role']; ?>" disabled>
              </div>
            </div>
          </div>
          <div class="card-action">
          </div>
        </form>

      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <center>
            Foto Profil
          </center>
        </div>
        <div class="card-body">
          <center>
            <div class="avatar avatar-xxl">
              <img src="<?php echo  $this->session->userdata['Image']; ?>" alt="..." class="avatar-img rounded-circle">
              <br><br>
              <h4><?php echo $this->session->userdata['Fullname']; ?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
