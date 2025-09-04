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
					<span>La noticia ha sido creada exitosamente.</span>
				</div><!-- d-flex -->
			</div><!-- alert -->
		<?php
		}
		?>
		<div class="card pd-20 pd-sm-40">
			<h6 class="card-body-title">Crear Noticia</h6>
			<form method="POST" action="<?= base_url('noticias') ?>" enctype="multipart/form-data">
				<div class="form">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label class="form-control-label">Título: <span class="tx-danger">*</span></label>
								<input class="form-control" type="text" name="titulo" placeholder="Ingresar título" required="true" autocomplete="off">
							</div>
						</div><!-- col-4 -->
						<div class="col-lg-4">
							<div class="form-group">
								<label class="form-control-label">Imagen (738 X 341) JPG (Máximo 24MB): <span class="tx-danger">*</span></label>
								<input onchange="ValidateSize(this, 24)" type="file" class="form-control" name="archivo">
							</div>
						</div><!-- col-4 -->
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label class="form-control-label">Noticia: <span class="tx-danger">*</span></label>
								<textarea class="form-control" id="summernote" required="true" name="noticia"></textarea>
							</div>
						</div><!-- col-4 -->
					</div>
				</div>
				<div class="form-layout-footer">
					<button type="submit" style="cursor: pointer;" name="guardar" class="btn btn-info mg-r-5">Guardar</button>
					<!-- form-layout-footer -->
				</div><!-- form-layout -->
			</form>
		</div>
	</div><!-- col-6 -->
</div><!-- row -->

<div class="row" style="background-color: transparent !important;">
	<?php
	foreach ($noticias as $n) {
	?>
		<div class="card bd-0 col-md-4" style="background-color: transparent; padding-top: 15px;">
			<div class="card-header card-header-default bg-default">
				<?= $n['titulo'] ?>
			</div><!-- card-header -->
			<div class="card-body bd bd-t-0 rounded-bottom bg-gray-200">
				<img src="<?= base_url('noticias-image/' . $n['archivo']) ?>" style="width: 100%;">
				<br>
				<br>
				<?php
				$noti = word_limiter($n['noticia'], 10);
				echo $noti;
				?>
			</div><!-- card-body -->
			<div class="card-footer">
				<?= date('d-m-Y', strtotime($n['fecha'])) ?>
				<a href="<?= base_url('noticias/leer/' . $n['id']) ?>" style="text-align: right;" class="btn btn-default btn-xs">VER MAS</a>
				<br>
				<a href="<?= base_url('noticias/editar_noticia/' . $n['id']) ?>" style="text-align: right;" class="btn btn-warning btn-xs">EDITAR</a>
				<a href="<?= base_url('noticias/eliminar_noticia/' . $n['id']) ?>" style="text-align: right;" class="btn btn-danger btn-xs">ELIMINAR</a>
			</div>
		</div><!-- card -->
	<?php
	}
	?>
</div>