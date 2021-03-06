<?php if(!$this->session->userdata['isLogin']){ redirect(base_url(''));} ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo $webConf->office_name; ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/img/icon.ico" type="image/x-icon"/>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
	WebFont.load({
		google: {"families":["Lato:300,400,700,900"]},
		custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/css/fonts.min.css']},
		active: function() {
			sessionStorage.fonts = true;
		}
	});
	</script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/css/atlantis.min.css">
	<link rel="stylesheet" href="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/css/demo.css">
	<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" />
	<link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap2/bootstrap-switch.css"  />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="<?php echo $webConf->background_color; ?>">
				<a href="<?php echo base_url() ?>" class="logo">
					<img src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="<?php echo $webConf->background_color; ?>">
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<div class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="button" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control" id="search" name="search">
							</div>
						</div>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret" >
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-envelope"></i>
							</a>
							<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
								<li>
									<div class="dropdown-title d-flex justify-content-between align-items-center">
										Messages
										<a href="#" class="small">Mark all as read</a>
									</div>
								</li>
								<li>
									<div class="message-notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-img">
													<img src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/img/jm_denis.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Jimmy Denis</span>
													<span class="block">
														How are you ?
													</span>
													<span class="time">5 minutes ago</span>
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>

						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="<?php echo $this->session->userdata['Image']; ?>" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="<?php echo $this->session->userdata['Image']; ?>" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?php echo $this->session->userdata['Fullname']; ?></h4>
												<p class="text-muted"><?php echo $this->session->userdata['Email']; ?></p><a href="<?php echo base_url('profile'); ?>" class="btn btn-xs btn-<?php echo $webConf->theme_color; ?> btn-sm">Lihat Profil</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?php echo base_url('profile'); ?>">Profil Saya</a>
										<a class="dropdown-item" href="<?php echo base_url('inbox'); ?>">Pesan</a>
										<a class="dropdown-item" href="<?php echo base_url('logout'); ?>">Keluar</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user" <?php if(!$this->session->userdata['isLogin']){echo 'hidden';} ?>>
						<div class="avatar-sm float-left mr-2">
							<img src="<?php echo $this->session->userdata['Image']; ?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $this->session->userdata['Fullname']; ?>
									<span class="user-level"><?php echo $this->session->userdata['Role']; ?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>
							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="<?php echo base_url('profile'); ?>">
											<span class="link-collapse">Profil Saya</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-<?php echo $webConf->theme_color;?>">
						<?php $this->load->view($this->session->userdata['Role'].'/Menu'); ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="main-panel">
			<div class="content">
        <?php $this->load->view($this->session->userdata['Role'].'/'.$viewName); ?>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						<?php echo date('Y') ?>, made with <i class="fa fa-heart heart text-danger"></i> by <a href="#">Tito</a>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<div class="modal fade" id="loading" role="dialog">
	  <div class="modal-dialog">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <div class="spinner-border text-secondary" role="status">
	          <span class="sr-only">Loading...</span>
	        </div>
	        &nbsp;
	        <h4>Loading Data</h4>
	        <button type="button" id="closeLoading" class="close" data-dismiss="modal">&times;</button>
	      </div>
	    </div>
	  </div>
	</div>



	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/core/popper.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/core/bootstrap.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/chart.js/chart.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/chart-circle/circles.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/datatables/datatables.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/atlantis.min.js"></script>

	<!-- Datatables -->
	<script src="<?php echo base_url('assets/template/AtlantisLite/'); ?>/assets/js/plugin/datatables/datatables.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>



	<script type="text/javascript">
		//Notify
		<?php if($this->session->userdata['notify']){
			echo "$.notify({icon: '".$this->session->userdata['icon']."',
			title: '".$this->session->userdata['title']."',
			message: '".$this->session->userdata['message']."',},{
				type: '".$this->session->userdata['type']."',
				placement : { from: 'bottom', align: 'right'}, time: 1000 });";
			} ?>
		</script>
		<script src="<?php echo base_url('assets/script/'.$viewName.'.js'); ?>"></script>

		<script type="text/javascript">
			$(document).ready(function() {
				$('.select2basic').select2();
				// $('#table1').DataTable();
				//   $('#summernote').summernote();
			});
		</script>

	</body>
	</html>
