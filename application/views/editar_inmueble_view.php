<div class="row row-sm mg-t-20">
	<div class="col-xl-12">
		<div class="card pd-20 pd-sm-40">
			<h6 class="card-body-title">Crear Noticia de Inmueble</h6>
			<form method="POST" action="<?= base_url('inmuebles/editar_inmuebles/' . $idedit) ?>" enctype="multipart/form-data">
				<div class="form">
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label class="form-control-label">Título: <span class="tx-danger">*</span></label>
								<input class="form-control" type="text" name="titulo" value="<?= $inmueble[0]['titulo'] ?>" required="true" autocomplete="off">
							</div>
						</div><!-- col-4 -->
						<div class="col-lg-2">
							<div class="form-group">
								<label class="form-control-label">Metros cuadrados: <span class="tx-danger">*</span></label>
								<input class="form-control" type="text" name="metros" value="<?= $inmueble[0]['metros'] ?>" required="true" autocomplete="off">
							</div>
						</div><!-- col-4 -->
						<div class="col-lg-2">
							<div class="form-group">
								<label class="form-control-label">Precio:</label>
								<input class="form-control" type="text" name="precio" value="<?= $inmueble[0]['precio'] ?>" required="true" autocomplete="off">
							</div>
						</div><!-- col-4 -->
						<div class="col-lg-2">
							<div class="form-group">
								<label class="form-control-label">Torre: <span class="tx-danger">*</span></label>
								<input class="form-control" type="text" name="torre" value="<?= $inmueble[0]['torre'] ?>" required="true" autocomplete="off">
							</div>
						</div><!-- col-4 -->
						<div class="col-lg-2">
							<div class="form-group">
								<label class="form-control-label">Oficina: <span class="tx-danger">*</span></label>
								<input class="form-control" type="text" name="oficina" value="<?= $inmueble[0]['oficina'] ?>" required="true" autocomplete="off">
							</div>
						</div><!-- col-4 -->
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label class="form-control-label">Detalle: <span class="tx-danger">*</span></label>
								<textarea class="form-control" id="summernote" required="true" name="detalle"><?= trim($inmueble[0]['detalle']) ?></textarea>
							</div>
						</div><!-- col-4 -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<img src="<?= base_url('inmuebles-image/' . $inmueble[0]['imagen']) ?>" style="width: 60%; margin-bottom: 10px;">
							<label class="form-control-label">Imagen (900 X 450) JPG: <span class="tx-danger">*</span></label>
							<input type="file" class="form-control" name="archivo">
						</div>
					</div><!-- col-4 -->
				</div>
				<div class="form-layout-footer">
					<button type="submit" style="cursor: pointer;" name="editar" class="btn btn-info mg-r-5">Editar</button>
					<a href="<?= base_url('inmuebles') ?>" style="cursor: pointer;" class="btn btn-default mg-r-5 cancelarElevador">Cancelar</a>
					<a href="<?= base_url('inmuebles/eliminar_inmueble/' . $inmueble[0]['id']) ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar?')" style="cursor: pointer; float: right;" class="btn btn-danger mg-r-5">Eliminar</a>
				</div><!-- form-layout -->
			</form>
		</div>
	</div><!-- col-6 -->
</div>
