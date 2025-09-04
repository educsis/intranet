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
  <script src="//cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

  <div class="am-signin-wrapper">
    <div class="am-signin-box">
      <div class="row no-gutters">
        <div class="col-lg-5">
          <div>
            <h2><img src="<?= base_url('assets/img/logo.png') ?>" style="width: 220px;"></h2>
            <hr>
            <p>INTRANET TEST  sd</p>
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
          if ($msg == 'cambio') {
          ?>
            <div class="alert alert-success" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="d-flex align-items-center justify-content-start">
                <i class="icon ion-ios-close alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                <span>Contraseña cambiada exitosamente.</span>
              </div><!-- d-flex -->
            </div><!-- alert -->
          <?php
          }
          ?>
          <form method="POST">
            <div class="form-group">
              <label class="form-control-label">Email:</label>
              <input type="email" name="email" class="form-control" placeholder="Ingresa el email con tu cuenta">
            </div><!-- form-group -->

            <div class="form-group">
              <label class="form-control-label">Contraseña:</label>
              <input type="password" name="password" class="form-control" placeholder="Ingresa tu contraseña">
            </div><!-- form-group -->
            <button type="submit" name="entrar" class="btn btn-block">Entrar</button>
          </form>
          <br>
          <a href="<?= base_url('login/olvide') ?>" style="text-decoration: underline;">Olvide mi contraseña</a>
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