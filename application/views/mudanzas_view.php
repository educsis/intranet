<style>
  table {
    font-size: 11px;
  }

  table.dataTable tbody th,
  table.dataTable tbody td {
    padding: 5px;
  }

  .vistabtn{
    border: 1px solid #2D3A50;
    padding: 3px 6px;
    border-radius: 4px;
    color: #2D3A50;
  }

  .vistabtn:hover{
    border: 1px solid #2D3A50;
    background-color: #2D3A50;
    color: #fff;
  }

  .vistabtn .disabled{
    border: 1px solid #f2f2f2;
    color: #f2f2f2;
  }
</style>
<div class="row row-sm mg-t-20">
  <div class="col-xl-12 mg-t-25 mg-xl-t-0">
    <div class="card pd-10 pd-sm-10 form-layout form-layout-5">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Seleccionar una opción</h6>
      <div class="form-group">
        <a href="javascript:void(0);" class="btn btn-default vistabtn disabled" data-tipobtn="0">Ver todo</a>
        <a href="javascript:void(0);" class="btn btn-default vistabtn" data-tipobtn="1">Solicitudes pendientes</a>
        <a href="javascript:void(0);" class="btn btn-default vistabtn" data-tipobtn="2">Solicitudes aprobadas</a>
        <a href="javascript:void(0);" class="btn btn-default vistabtn" data-tipobtn="3">Solicitudes denegadas</a>
        <a href="javascript:void(0);" class="btn btn-default vistabtn" data-tipobtn="4">Solicitudes completadas</a>
      </div>
    </div><!-- card -->
  </div><!-- col-6 -->
</div>

<div class="row row-sm mg-t-20 vista1">
  <div class="col-xl-12 mg-t-25 mg-xl-t-0">
    <div class="card pd-10 pd-sm-10 form-layout form-layout-5">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Solicitudes pendientes</h6>
      <div class="table-wrapper">
        <table id="datatable2" class="table table-condensed table-bordered display table-dark responsive nowrap">
          <thead>
            <tr>
							<th style="width: 60px;">ID</th>
              <th></th>
              <th>Tipo</th>
              <th>Oficina</th>
              <th style="width: 90px;">Fecha/Hora</th>
              <th style="width: 60px;">Torre</th>
              <th style="width: 60px;">Oficina</th>
              <th style="width: 60px;">Estado</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($solicitudes as $s) {
              if ($s['status_mudanza'] == 0) {
                $fecha_solicitud = date('d-m-Y', strtotime($s['fecha']));
                $tipo = $s['tipo'];

                if ($s['status_mudanza'] == 0) {
                  $estado = "PENDIENTE";
                  $estadocolor = "#ffc14d";
                } elseif ($s['status_mudanza'] == 1) {
                  $estado = "APROBADO";
                  $estadocolor = "#00b300";
                } elseif ($s['status_mudanza'] == 2) {
                  $estado = "DENEGADO";
                  $estadocolor = "#ff0000";
                }
            ?>
                <tr>
									<td style="text-align: center;"><?= $s['id'] ?></td>
                  <td style="width:30px; text-align: center;"><a target="_blank" href="<?= base_url('solicitudes/solicitud_mudanzas/' . $s['id']) ?>" class="btn btn-sm btn-default"><i class="fa fa-link"></i></a></td>
                  <td style="padding-top: 15px;"><?= $tipo ?></td>
                  <td style="padding-top: 15px;"><?= $s['nombre_oficina'] ?></td>
                  <td style="text-align: center; padding-top: 15px;"><?= $fecha_solicitud ?></td>
                  <td style="text-align: center; padding-top: 15px; width: 60px;"><?= $s['torre'] ?></td>
                  <td style="text-align: center; padding-top: 15px; width: 60px;"><?= $s['numero_oficina'] ?></td>
                  <td style="text-align: center; background-color: <?= $estadocolor ?>; color: #fff; padding-top: 15px;"><?= $estado ?></td>
                  <td style="width: 100px; text-align: center;">
                    <!-- <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-type="aprobado" data-titulo="Aceptar Solicitud" data-ids="<?= $s['id'] ?>" data-target="#explicacionmodal1"><i class="fa fa-check"></i></a>                     -->
                    <form method="POST" action="<?= base_url('mudanzas/estatus_change_mudanza') ?>">
                      <input type="hidden" name="ids" value="<?= $s['id'] ?>">
                      <button style="cursor: pointer;" type="submit" name="aprobar_mudanza" class="btn btn-sm btn-success"><i class="fa fa-check"></i></button>
                      <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-type="negado" data-titulo="Negar Solicitud" data-ids="<?= $s['id'] ?>" data-target="#explicacionmodal1"><i class="fa fa-times"></i></a>
                    </form>
                  </td>
                </tr>
            <?php }
            } ?>
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->
  </div><!-- col-6 -->
</div>

<div class="row row-sm mg-t-20 vista2">
  <div class="col-xl-12 mg-t-25 mg-xl-t-0">
    <div class="card pd-10 pd-sm-10 form-layout form-layout-5">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Solicitudes aprobadas</h6>
      <div class="table-wrapper">
        <table id="datatable3" class="table table-condensed table-bordered display table-dark responsive nowrap">
          <thead>
            <tr>
							<th style="width: 60px;">ID</th>
              <th></th>
              <th>Tipo</th>
              <th>Oficina</th>
              <th style="width: 90px;">Fecha</th>
              <th style="width: 60px;">Torre</th>
              <th style="width: 60px;">Oficina</th>
              <th style="width: 60px;">Estado</th>
              <th style="width: 60px;"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($solicitudes as $s) {
              if ($s['status_mudanza'] == 1) {
                $fecha_solicitud = date('d-m-Y', strtotime($s['fecha']));
                $tipo = $s['tipo'];

                if ($s['status_mudanza'] == 0) {
                  $estado = "PENDIENTE";
                  $estadocolor = "#ffc14d";
                } elseif ($s['status_mudanza'] == 1) {
                  $estado = "APROBADO";
                  $estadocolor = "#00b300";
                } elseif ($s['status_mudanza'] == 2) {
                  $estado = "DENEGADO";
                  $estadocolor = "#ff0000";
                }
            ?>
                <tr>
									<td style="text-align: center;"><?= $s['id'] ?></td>
                  <td style="width:30px; text-align: center;"><a target="_blank" href="<?= base_url('solicitudes/solicitud_mudanzas/' . $s['id']) ?>" class="btn btn-sm btn-default"><i class="fa fa-link"></i></a></td>
                  <td style="padding-top: 15px;"><?= $tipo ?></td>
                  <td style="padding-top: 15px;"><?= $s['nombre_oficina'] ?></td>
                  <td style="text-align: center; padding-top: 15px;"><?= $fecha_solicitud ?></td>
                  <td style="text-align: center; padding-top: 15px; width: 60px;"><?= $s['torre'] ?></td>
                  <td style="text-align: center; padding-top: 15px;"><?= $s['numero_oficina'] ?></td>
                  <td style="text-align: center; background-color: <?= $estadocolor ?>; color: #fff; padding-top: 15px;"><?= $estado ?></td>
                  <td style="width: 50px; text-align: center;">
                    <!-- <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-type="aprobado" data-titulo="Aceptar Solicitud" data-ids="<?= $s['id'] ?>" data-target="#explicacionmodal1"><i class="fa fa-check"></i></a>                     -->
                    <form method="POST" action="<?= base_url('mudanzas/estatus_change_mudanza') ?>">
                      <input type="hidden" name="ids" value="<?= $s['id'] ?>">
                      <button style="cursor: pointer; background-color: #00a6f5; color: #fff;" type="submit" name="completar_mudanza" class="btn btn-sm btn-info"><i class="fa fa-check"></i></button>
                    </form>
                  </td>
                </tr>
            <?php }
            } ?>
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->
  </div><!-- col-6 -->
</div>

<div class="row row-sm mg-t-20 vista3">
  <div class="col-xl-12 mg-t-25 mg-xl-t-0">
    <div class="card pd-10 pd-sm-10 form-layout form-layout-5">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Solicitudes denegadas</h6>
      <div class="table-wrapper">
        <table id="datatable4" class="table table-condensed table-bordered display table-dark responsive nowrap">
          <thead>
            <tr>
							<th style="width: 60px;">ID</th>
              <th></th>
              <th>Tipo</th>
              <th>Oficina</th>
              <th style="width: 90px;">Fecha</th>
              <th style="width: 60px;">Torre</th>
              <th style="width: 60px;">Oficina</th>
              <th style="width: 60px;">Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($solicitudes as $s) {
              if ($s['status_mudanza'] == 2) {
                $fecha_solicitud = date('d-m-Y', strtotime($s['fecha']));
                $tipo = $s['tipo'];

                if ($s['status_mudanza'] == 0) {
                  $estado = "PENDIENTE";
                  $estadocolor = "#ffc14d";
                } elseif ($s['status_mudanza'] == 1) {
                  $estado = "APROBADO";
                  $estadocolor = "#00b300";
                } elseif ($s['status_mudanza'] == 2) {
                  $estado = "DENEGADO";
                  $estadocolor = "#ff0000";
                }
            ?>
                <tr>
									<td style="text-align: center;"><?= $s['id'] ?></td>
                  <td style="width:30px; text-align: center;"><a target="_blank" href="<?= base_url('solicitudes/solicitud_mudanzas/' . $s['id']) ?>" class="btn btn-sm btn-default"><i class="fa fa-link"></i></a></td>
                  <td style="padding-top: 15px;"><?= $tipo ?></td>
                  <td style="padding-top: 15px;"><?= $s['nombre_oficina'] ?></td>
                  <td style="text-align: center; padding-top: 15px; width: 200px;"><?= $fecha_solicitud ?></td>
                  <td style="text-align: center; padding-top: 15px; width: 60px;"><?= $s['torre'] ?></td>
                  <td style="text-align: center; padding-top: 15px;"><?= $s['numero_oficina'] ?></td>
                  <td style="text-align: center; background-color: <?= $estadocolor ?>; color: #fff; padding-top: 15px;"><?= $estado ?></td>
                </tr>
            <?php }
            } ?>
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->
  </div><!-- col-6 -->
</div>

<div class="row row-sm mg-t-20 vista4">
  <div class="col-xl-12 mg-t-25 mg-xl-t-0">
    <div class="card pd-10 pd-sm-10 form-layout form-layout-5">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Solicitudes completadas</h6>
      <div class="table-wrapper">
        <table id="datatable5" class="table table-condensed table-bordered display table-dark responsive nowrap">
          <thead>
            <tr>
							<th style="width: 60px;">ID</th>
              <th></th>
              <th>Tipo</th>
              <th>Oficina</th>
              <th style="width: 90px;">Fecha</th>
              <th style="width: 60px;">Torre</th>
              <th style="width: 60px;">Oficina</th>
              <th style="width: 60px;">Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($solicitudes as $s) {
              if ($s['status_mudanza'] == 3) {
                $fecha_solicitud = date('d-m-Y', strtotime($s['fecha']));
                $tipo = $s['tipo'];

                if ($s['status_mudanza'] == 0) {
                  $estado = "PENDIENTE";
                  $estadocolor = "#ffc14d";
                } elseif ($s['status_mudanza'] == 1) {
                  $estado = "APROBADO";
                  $estadocolor = "#00b300";
                } elseif ($s['status_mudanza'] == 2) {
                  $estado = "DENEGADO";
                  $estadocolor = "#ff0000";
                } elseif ($s['status_mudanza'] == 3) {
                  $estado = "COMPLETADO";
                  $estadocolor = "#00a6f5";
                }
            ?>
                <tr>
									<td style="text-align: center;"><?= $s['id'] ?></td>
                  <td style="width:30px; text-align: center;"><a target="_blank" href="<?= base_url('solicitudes/solicitud_mudanzas/' . $s['id']) ?>" class="btn btn-sm btn-default"><i class="fa fa-link"></i></a></td>
                  <td style="padding-top: 15px;"><?= $tipo ?></td>
                  <td style="padding-top: 15px;"><?= $s['nombre_oficina'] ?></td>
                  <td style="text-align: center; padding-top: 15px; width: 200px;"><?= $fecha_solicitud ?></td>
                  <td style="text-align: center; padding-top: 15px; width: 60px;"><?= $s['torre'] ?></td>
                  <td style="text-align: center; padding-top: 15px;"><?= $s['numero_oficina'] ?></td>
                  <td style="text-align: center; background-color: <?= $estadocolor ?>; color: #fff; padding-top: 15px;"><?= $estado ?></td>
                </tr>
            <?php }
            } ?>
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->
  </div><!-- col-6 -->
</div>

<div id="explicacionmodal1" class="modal fade">
  <div class="modal-dialog modal-md" role="document" style="width: 500px !important;">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold tituloModal"></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?= base_url('mudanzas/estatus_change_mudanza') ?>">
        <input type="hidden" class="ids" name="ids">
        <div class="modal-body pd-20">
          <div class="row">
            <div class="col-md-12 form-group">
              <label>Razón</label>
              <textarea class="form-control larazon" name="razon" required="true" autocomplete="off"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" name="negar_mudanza" class="btn btn-info pd-x-20 submitbtn">Enviar</button>
          <button type="button" class=  "closerazon btn btn-secondary pd-x-20" data-dismiss="modal">Cerrar</button>
        </div>
      </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->
