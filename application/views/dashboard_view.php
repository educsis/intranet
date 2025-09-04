<!-- your content goes here -->
<div class="card pd-20 pd-sm-40">
  <div class="row mg-b-20">
    <div class="col-md mg-t-20 mg-md-t-0">
      <div class="card card-body bg-dark tx-white bd-0" style="text-align: center;">
        <img src="<?= base_url('assets/img/logo.png') ?>" style="width: 200px; margin: auto;">
      </div><!-- card -->
    </div><!-- col -->
  </div><!-- row -->
  <div class="row">
    <div class="col-md-12">
      <h3 class="card-text" style="color: #FB9134;">Bienvenido, <?= $_SESSION['nombres'] ?></h3>
      <p style="font-size: 1.2rem;">
        El portal privado de Zona Pradera es una herramienta electrónica que le permitirá realizar gestiones de forma ágil y práctica desde cualquier dispositivo con acceso a internet durante las 24 horas del día.
      </p>
      <p style="font-size: 1.2rem;">
        Al registrarse con su usuario tendrá acceso a las siguientes secciones:
      </p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <img src="<?= base_url('assets/img/botones-intranet.png') ?>" usemap="#image-map" >
			<map name="image-map">
				<area target="_self" alt="" title="" href="<?= base_url('elevadores') ?>" coords="341,119,-1,1" shape="rect">
				<area target="_self" alt="" title="" href="<?= base_url('remodelaciones') ?>" coords="369,4,781,116" shape="rect">
				<area target="_self" alt="" title="" href="<?= base_url('mudanzas') ?>" coords="809,5,1192,116" shape="rect">
				<area target="_self" alt="" title="" href="<?= base_url('archivos') ?>" coords="0,159,339,267" shape="rect">
				<area target="_self" alt="" title="" href="<?= base_url('noticias') ?>" coords="364,159,747,269" shape="rect">
				<area target="_self" alt="" title="" href="<?= base_url('inmuebles') ?>" coords="805,161,1194,265" shape="rect">
		</map>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <br>
      <p style="font-size: 1.2rem;">Para mayor información llamar al <span><a href="tel:+502 22076603">2207-6603</a></span> o enviar correo a <span><a href="mailto:atencionalcliente@zonapradera.com">atencionalcliente@zonapradera.com</a></span> </span> </p>
    </div>
  </div>
</div> <!-- card -->
