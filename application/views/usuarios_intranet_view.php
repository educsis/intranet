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
    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Crear usuarios intranet</h6>
      <form method="POST" action="<?= base_url('usuarios/intranet') ?>">
        <div class="form-layout">
          <div class="row mg-b-25">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Nombres: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="nombres" value="" placeholder="Ingresar nombres">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Apellidos: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="apellidos" value="" placeholder="Ingresar apellidos">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="email" value="" placeholder="Ingresar email">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-8">
              <label class="form-control-label">Empresa: <span class="tx-danger">*</span></label>
              <select class="form-control select2-show-search" name="oficina" data-placeholder="Selecciona una opción">
                <option label="Selecciona una opción"></option>
                <?php
                foreach ($oficinas as $o) {
                ?>
                  <option value="<?= $o['id_oficina'] ?>"><?= $o['nombre_oficina'] ?></option>
                <?php
                }
                ?>
              </select>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Contraseña: <span class="tx-danger">*</span></label>
                <input class="form-control" type="password" name="password" value="" placeholder="Ingresar contraseña">
              </div>
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

<div class="row row-sm mg-t-20">
  <div class="col-xl-12 mg-t-25 mg-xl-t-0">
    <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Usuarios intranet</h6>
      <div class="table-wrapper">
        <table id="datatable2" class="table table-condensed table-bordered display table-success responsive nowrap">
          <thead>
            <tr>
              <th>Nombre completo</th>
              <th>Empresa</th>
              <th>Email</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($usuarios as $u) {
            ?>
              <tr>
                <td><?= $u['nombres'] . ', ' . $u['apellidos'] ?></td>
                <td><?= $u['nombre_oficina'] ?></td>
                <td><?= $u['email'] ?></td>
                <td style="width: 100px; text-align: center;">
                  <a href="<?= base_url('usuarios/editar_intranet/' . $u['id']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                  <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="confirmDeleteUser('<?= $u['id']; ?>')"><i class="fa fa-close"></i></a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->
  </div><!-- col-6 -->
</div>