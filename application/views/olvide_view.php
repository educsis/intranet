<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/png" href="<?= base_url('favicon.png') ?>" />

	<title>Zona Pradera Intranet</title>

	<!-- vendor css -->
	<link href="<?= base_url('assets/lib/font-awesome/css/font-awesome.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/lib/Ionicons/css/ionicons.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/lib/perfect-scrollbar/css/perfect-scrollbar.css') ?>" rel="stylesheet">

	<!-- Amanda CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/css/particle.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/amanda.css') ?>">
</head>

<body id="loginbody">

	<div id="particles-js"></div>
	<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

	<div class="am-signin-wrapper">
		<div class="am-signin-box">
			<div class="row no-gutters">
				<div class="col-lg-5">
					<div>
						<h2><img src="<?= base_url('assets/img/logo.png') ?>" style="width: 220px;"></h2>
						<hr>
						<p>INTRANET</p>
					</div>
				</div>
				<div class="col-lg-7">
					<?php
					if ($msg == 'error') {
					?>
						<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<div class="d-flex align-items-center justify-content-start">
								<i class="icon ion-ios-close alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
								<span>Error. Usuario o contraseña incorrecta.</span>
							</div><!-- d-flex -->
						</div><!-- alert -->
					<?php
					}
					?>
					<?php
					if ($msg == 'sent') {
					?>
						<div class="alert alert-success" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<div class="d-flex align-items-center justify-content-start">
								<i class="icon ion-ios-close alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
								<span>Se ha enviado un correo para recuperar su contraseña. Revise carpeta de spam.</span>
							</div><!-- d-flex -->
						</div><!-- alert -->
					<?php
					}
					?>
					<form method="POST" action="<?= base_url('login/olvide') ?>">
						<div class="form-group">
							<label class="form-control-label">Email:</label>
							<input type="email" name="email" class="form-control" placeholder="Ingresa el email para recuperar tu contraseña">
						</div><!-- form-group -->
						<button type="submit" name="recuperar" class="btn btn-block">Entrar</button>
					</form>
				</div><!-- col-7 -->
			</div><!-- row -->
			<p class="tx-center tx-white-5 tx-12 mg-t-15">Zona Pradera &copy; <?= date('Y') ?>. Derechos reservados</p>
		</div><!-- signin-box -->
	</div><!-- am-signin-wrapper -->

	<script src="<?= base_url('assets/lib/jquery/jquery.js') ?>"></script>
	<script src="<?= base_url('assets/lib/popper.js/popper.js') ?>"></script>
	<script src="<?= base_url('assets/lib/bootstrap/bootstrap.js') ?>"></script>
	<script src="<?= base_url('assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') ?>"></script>
	<script src="<?= base_url('assets/js/particle.js') ?>"></script>

	<script src="<?= base_url('assets/js/amanda.js') ?>"></script>
</body>

</html>