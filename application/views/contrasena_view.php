<div class="row row-sm mg-t-20">
	<div class="col-xl-6">
		<?php
		if ($msg == 'changed') {
		?>
			<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="d-flex align-items-center justify-content-start">
					<i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
					<span>Su contraseña ha sido actualizada exitosamente.</span>
				</div><!-- d-flex -->
			</div><!-- alert -->
		<?php
		}
		?>
		<?php
		if ($msg == 'notequal') {
		?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="d-flex align-items-center justify-content-start">
					<i class="icon ion-ios-delete alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
					<span>Sus contraseñas no son iguales.</span>
				</div><!-- d-flex -->
			</div><!-- alert -->
		<?php
		}
		?>
		<?php
		if ($msg == 'noexiste') {
		?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="d-flex align-items-center justify-content-start">
					<i class="icon ion-ios-delete alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
					<span>La contraseña que ingreso no es su contraseña actual.</span>
				</div><!-- d-flex -->
			</div><!-- alert -->
		<?php
		}
		?>
		<div class="card pd-20 pd-sm-40">
			<h6 class="card-body-title">Actualizar contraseña</h6>
			<form method="POST" action="<?= base_url('contrasena') ?>">
				<div class="form">
					<div class="row">
						<div class="col-lg-8">
							<div class="form-group">
								<label class="form-control-label">Contraseña actual: <span class="tx-danger">*</span></label>
								<input class="form-control" type="password" name="passwordactual" placeholder="Ingresar contraseña" required="true" autocomplete="off">
							</div>
						</div><!-- col-4 -->
					</div>
					<div class="row">
						<div class="col-lg-8">
							<div class="form-group">
								<label class="form-control-label">Nueva contraseña: <span class="tx-danger">*</span></label>
								<input class="form-control" type="password" name="passwordnueva" placeholder="Ingresar nueva contraseña" required="true" autocomplete="off">
							</div>
						</div><!-- col-4 -->
					</div>
					<div class="row">
						<div class="col-lg-8">
							<div class="form-group">
								<label class="form-control-label">Confirmar contraseña: <span class="tx-danger">*</span></label>
								<input class="form-control" type="password" name="passwordverifica" placeholder="Confirmar contraseña" required="true" autocomplete="off">
							</div>
						</div><!-- col-4 -->
					</div>
					<div class="form-layout-footer">
						<button type="submit" style="cursor: pointer;" name="guardar" class="btn btn-info mg-r-5">Cambiar contraseña</button>
					</div><!-- form-layout-footer -->
				</div><!-- form-layout -->
			</form>
		</div>
	</div><!-- col-6 -->
</div><!-- row -->