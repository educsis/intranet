<div class="row row-sm mg-t-20">
	<div class="col-xl-12">
		<?php
		if ($msg == 'success') {
		?>
			<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="d-flex align-items-center justify-content-start">
					<i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
					<span>El inmueble ha sido creado exitosamente.</span>
				</div><!-- d-flex -->
			</div><!-- alert -->
		<?php
		}
		?>
		<div class="card pd-20 pd-sm-40">
			<h6 class="card-body-title">Crear Noticia de Inmueble</h6>
			<form method="POST" action="<?= base_url('inmuebles') ?>" enctype="multipart/form-data">
				<div class="form">
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label class="form-control-label">Título: <span class="tx-danger">*</span></label>
								<input class="form-control" type="text" name="titulo" placeholder="Ingresar título" required="true" autocomplete="off">
							</div>
						</div><!-- col-4 -->
						<div class="col-lg-2">
							<div class="form-group">
								<label class="form-control-label">Metros cuadrados: <span class="tx-danger">*</span></label>
								<input class="form-control" type="text" name="metros" placeholder="Ingresar metros cuadrados" required="true" autocomplete="off">
							</div>
						</div><!-- col-4 -->
						<div class="col-lg-2">
							<div class="form-group">
								<label class="form-control-label">Precio:</label>
								<input class="form-control" type="text" name="precio" placeholder="Ingresar precio" required="true" autocomplete="off">
							</div>
						</div><!-- col-4 -->
						<div class="col-lg-2">
							<div class="form-group">
								<label class="form-control-label">Torre: <span class="tx-danger">*</span></label>
								<input class="form-control" type="text" name="torre" placeholder="Ingresar torre" required="true" autocomplete="off">
							</div>
						</div><!-- col-4 -->
						<div class="col-lg-2">
							<div class="form-group">
								<label class="form-control-label">Oficina: <span class="tx-danger">*</span></label>
								<input class="form-control" type="text" name="oficina" placeholder="Ingresar oficina" required="true" autocomplete="off">
							</div>
						</div><!-- col-4 -->
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label class="form-control-label">Detalle: <span class="tx-danger">*</span></label>
								<textarea class="form-control" id="summernote" required="true" name="detalle"></textarea>
							</div>
						</div><!-- col-4 -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label class="form-control-label">Imagen (900 X 450) JPG: <span class="tx-danger">*</span></label>
							<input type="file" class="form-control" name="archivo">
						</div>
					</div><!-- col-4 -->
				</div>
				<div class="form-layout-footer">
					<button type="submit" style="cursor: pointer;" name="guardar" class="btn btn-info mg-r-5">Guardar</button>
				</div><!-- form-layout -->
			</form>
		</div>
	</div><!-- col-6 -->
</div><!-- row -->

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
				if($noti){
					// echo $noti;
				}	
				?>
			</div>
			<div class="card-footer">
				<?= date('d-m-Y', strtotime($n['fecha'])) ?>
				<a href="<?= base_url('inmuebles/detalle/' . $n['id']) ?>" style="text-align: right;" class="btn btn-default btn-xs">VER MAS</a>
				<a href="<?= base_url('inmuebles/editar_inmuebles/' . $n['id']) ?>" style="text-align: right;" class="btn btn-warning btn-xs">EDITAR</a>
			</div>
		</div><!-- card -->
	<?php
	}
	?>
</div>
