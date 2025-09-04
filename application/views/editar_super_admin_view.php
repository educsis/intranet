<div class="row row-sm mg-t-20">
	<div class="col-xl-5">
		<form method="POST" action="<?= base_url('usuarios/editar_superadmin/' . $usuario['id_usuarios']) ?>">
			<?php
			$nombreArray = explode(', ', $usuario['nombre_usuarios']);
			?>
			<div class="card pd-20 pd-sm-40 form-layout form-layout-4">
				<h6 class="card-body-title">Editar usuario</h6>
				<div class="row">
					<label class="col-sm-4 form-control-label">Nombres: <span class="tx-danger">*</span></label>
					<div class="col-sm-8 mg-t-10 mg-sm-t-0">
						<input type="text" class="form-control" value="<?= $nombreArray[0]; ?>" name="nombres" placeholder="Ingresar nombres" required="true" autocomplete="off">
					</div>
				</div><!-- row -->
				<div class="row mg-t-20">
					<label class="col-sm-4 form-control-label">Apellidos: <span class="tx-danger">*</span></label>
					<div class="col-sm-8 mg-t-10 mg-sm-t-0">
						<input type="text" class="form-control" value="<?= @$nombreArray[1]; ?>" name="apellidos" placeholder="Ingresar apellidos" required="true" autocomplete="off">
					</div>
				</div>
				<div class="row mg-t-20">
					<label class="col-sm-4 form-control-label">Email: <span class="tx-danger">*</span></label>
					<div class="col-sm-8 mg-t-10 mg-sm-t-0">
						<input type="email" class="form-control" name="email" value="<?= $usuario['email_usuarios'] ?>" placeholder="Ingresar email para login." required="true" autocomplete="off">
					</div>
				</div>
				<div class="form-layout-footer mg-t-30">
					<button name="guardar" class="btn btn-info mg-r-5">Guardar</button>
				</div><!-- form-layout-footer -->
			</div><!-- card -->
		</form>
	</div><!-- col-6 -->
</div><!-- row -->