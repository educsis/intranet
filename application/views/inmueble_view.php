<!-- your content goes here -->
<div class="card pd-20 pd-sm-40">
	<div class="row mg-b-20">
		<div class="col-md-6 mg-t-20 mg-md-t-0">
			<h3><?= $inmueble[0]['titulo'] ?></h3>
			<img src="<?= base_url('inmuebles-image/' . $inmueble[0]['imagen']) ?>" style="width: 100%;">
		</div><!-- col -->
		<div class="col-md-6 mg-t-20 mg-md-t-0">
			<br><br>
			<?= $inmueble[0]['detalle'] ?>
			<p><strong>Fecha:</strong><?= date('d-m-Y', strtotime($inmueble[0]['fecha'])) ?></p>
			<?php
			if ($inmueble[0]['metros']) {
			?>
			<p><strong>Metros:</strong>Q<?= $inmueble[0]['metros']; ?> metros cuadrados</p>
			<?php
			}
			?>
			<?php
			if ($inmueble[0]['precio']) {
			?>
				<p><strong>Precio:</strong>Q<?= $inmueble[0]['precio']; ?></p>
			<?php
			}
			?>
		</div>
	</div><!-- row -->
</div><!-- card -->