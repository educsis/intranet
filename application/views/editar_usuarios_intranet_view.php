<div class="row row-sm mg-t-20">
	<div class="col-xl-12">
    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Editar usuario intranet</h6>
        <form method="POST" action="<?= base_url('usuarios/editar_intranet/'.$usuario['id'] ) ?>">
        <div class="form-layout">
          <div class="row mg-b-25">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Nombres: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="nombres" value="<?= $usuario['nombres'] ?>" placeholder="Ingresar nombres">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Apellidos: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="apellidos" value="<?= $usuario['apellidos'] ?>" placeholder="Ingresar apellidos">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="email" value="<?= $usuario['email'] ?>" placeholder="Ingresar email">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-8">
              <label class="form-control-label">Empresa: <span class="tx-danger">*</span></label>
              <input type="text" class="form-control" disabled="disabled" value="<?= $usuario['nombre_oficina'] ?>">
							<input type="hidden" name="empresaid" value="<?= $usuario['id_oficina'] ?>">
              <input type="hidden" name="userid" value="<?= $usuario['id'] ?>">
            </div><!-- col-4 -->
          </div><!-- row -->

          <div class="form-layout-footer">
            <button type="submit" name="guardar" class="btn btn-info mg-r-5">Guardar</button>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
        </form>
    </div>
	</div><!-- col-6 -->
</div><!-- row -->