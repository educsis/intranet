<div class="row row-sm mg-t-20">
	<div class="col-xl-5">
		<?php
		if ($msg == 'success') {
		?>
			<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="d-flex align-items-center justify-content-start">
					<i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
					<span>Usuario creado exitosamente.</span>
				</div><!-- d-flex -->
			</div><!-- alert -->
		<?php
		} elseif ($msg == 'edited') {
		?>
			<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="d-flex align-items-center justify-content-start">
					<i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
					<span>Usuario editado exitosamente.</span>
				</div><!-- d-flex -->
			</div><!-- alert -->
		<?php
		}
		?>
		<?php
		if ($msg == 'exist') {
		?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="d-flex align-items-center justify-content-start">
					<i class="icon ion-ios-close alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
					<span>El usuario que desea crear ya exite.</span>
				</div><!-- d-flex -->
			</div><!-- alert -->
		<?php
		}
		?>
		<form method="POST">
			<div class="card pd-20 pd-sm-40 form-layout form-layout-4">
				<h6 class="card-body-title">Crear usuario</h6>
				<div class="row">
					<label class="col-sm-4 form-control-label">Nombres: <span class="tx-danger">*</span></label>
					<div class="col-sm-8 mg-t-10 mg-sm-t-0">
						<input type="text" class="form-control" name="nombres" placeholder="Ingresar nombres" required="true" autocomplete="off">
					</div>
				</div><!-- row -->
				<div class="row mg-t-20">
					<label class="col-sm-4 form-control-label">Apellidos: <span class="tx-danger">*</span></label>
					<div class="col-sm-8 mg-t-10 mg-sm-t-0">
						<input type="text" class="form-control" name="apellidos" placeholder="Ingresar apellidos" required="true" autocomplete="off">
					</div>
				</div>
				<div class="row mg-t-20">
					<label class="col-sm-4 form-control-label">Email: <span class="tx-danger">*</span></label>
					<div class="col-sm-8 mg-t-10 mg-sm-t-0">
						<input type="email" class="form-control" name="email" placeholder="Ingresar email para login." required="true" autocomplete="off">
					</div>
				</div>
				<div class="row mg-t-20">
					<label class="col-sm-4 form-control-label">Contraseña: <span class="tx-danger">*</span></label>
					<div class="col-sm-8 mg-t-10 mg-sm-t-0">
						<input type="password" class="form-control" name="password" placeholder="Ingresar contraseña para login." required="true" autocomplete="off">
					</div>
				</div>
				<div class="form-layout-footer mg-t-30">
					<button name="guardar" class="btn btn-info mg-r-5">Guardar</button>
				</div><!-- form-layout-footer -->
			</div><!-- card -->
		</form>
	</div><!-- col-6 -->

	<div class="col-xl-7 mg-t-25 mg-xl-t-0">
		<div class="card pd-20 pd-sm-40 form-layout form-layout-5">
			<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Usuarios</h6>
			<table class="table table-condensed table-bordered table-success">
				<thead>
					<tr>
						<th>Nombre</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($usuarios as $u) {
					?>
						<tr>
							<td><?= $u['nombre_usuarios'] ?></td>
							<td style="width: 100px; text-align: center;">
								<a href="<?= base_url('usuarios/editar_superadmin/' . $u['id_usuarios']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
								<a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="confirmDeleteUserAdmin('<?= $u['id_usuarios']; ?>')"><i class="fa fa-close"></i></a>
							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div><!-- card -->
	</div><!-- col-6 -->
</div><!-- row -->