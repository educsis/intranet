<div class="row">
	<div class="col-md-12">
		<p style="padding: 10px; background-color: #fff;">Sección exclusiva para Propietarios de oficinas en Zona Pradera, para promover la venta y/o renta de su inmueble sin ningún costo.</p>
	</div>
</div>
<hr>
<div class="row" style="background-color: transparent !important;">
	<?php
	foreach ($inmuebles as $n) {
	?>
		<div class="card bd-0 col-md-4" style="background-color: transparent; padding-top: 15px;">
			<div class="card-header card-header-default bg-default">
				<?= $n['titulo'] ?>
			</div><!-- card-header -->
			<div class="card-body bd bd-t-0 rounded-bottom bg-gray-200">
				<img src="<?= base_url('inmuebles-image/' . $n['imagen']) ?>" style="width: 100%;">
				<br>
				<br>
				<?php
				$noti = word_limiter($n['detalle'], 10);
				// echo $noti;
				?>
			</div><!-- card-body -->
			<div class="card-footer">
				<?= date('d-m-Y', strtotime($n['fecha'])) ?>
				<a href="<?= base_url('inmuebles/detalle/' . $n['id']) ?>" style="text-align: right;" class="btn btn-default btn-xs">VER MAS</a>
			</div>
		</div><!-- card -->
	<?php
	}
	?>
</div>
