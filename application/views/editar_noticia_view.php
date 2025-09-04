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
					<span>La noticia ha sido editada exitosamente.</span>
				</div><!-- d-flex -->
			</div><!-- alert -->
		<?php
		}
		?>
		<div class="card pd-20 pd-sm-40">
			<h6 class="card-body-title">Editar Noticia</h6>
			<form method="POST" action="<?= base_url('noticias/editar_noticia/'.$noticia[0]['id']) ?>" enctype="multipart/form-data">
				<div class="form">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label class="form-control-label">Título: <span class="tx-danger">*</span></label>
								<input class="form-control" type="text" name="titulo" placeholder="Ingresar título" required="true" autocomplete="off" value="<?= $noticia[0]['titulo'] ?>">
							</div>
						</div><!-- col-4 -->
						<div class="col-lg-4">
							<div class="form-group">
								<label class="form-control-label">Imagen (738 X 341) JPG (Máximo 4MB): <span class="tx-danger">*</span></label>
								<input onchange="ValidateSize(this, 4)" type="file" class="form-control" name="archivo">
							</div>
						</div><!-- col-4 -->
						<div class="col-md-2">
							<img src="<?= base_url('noticias-image/' . $noticia[0]['archivo']) ?>" style="width: 100%;">
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label class="form-control-label">Noticia: <span class="tx-danger">*</span></label>
								<textarea class="form-control" id="summernote" required="true" name="noticia"><?= $noticia[0]['noticia'] ?></textarea>
							</div>
						</div><!-- col-4 -->
					</div>
				</div>
				<div class="form-layout-footer">
					<button type="submit" style="cursor: pointer;" name="guardar" class="btn btn-info mg-r-5">Guardar</button>
					<a href="<?= base_url('noticias') ?>" class="btn btn-default mg-r-5">CANCELAR</a>
					<!-- form-layout-footer -->
				</div><!-- form-layout -->
			</form>
		</div>
	</div><!-- col-6 -->
</div><!-- row -->