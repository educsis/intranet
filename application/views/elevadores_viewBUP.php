<style>
  table {
    font-size: 11px;
  }

  table.dataTable tbody th,
  table.dataTable tbody td {
    padding: 5px;
  }
</style>
<div class="row row-sm mg-t-20">
  <div class="col-xl-12 mg-t-25 mg-xl-t-0">
    <div class="card pd-10 pd-sm-10 form-layout form-layout-5">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Solicitudes pendientes</h6>
      <div class="table-wrapper">
        <table id="datatable2" class="table table-condensed table-bordered display table-dark responsive nowrap">
          <thead>
            <tr>
              <th>Oficina</th>
              <th>Tipo</th>
              <th style="width: 90px;">Fecha Solicitud</th>
              <th style="width: 60px;">Horario</th>
              <th style="width: 60px;">Estado</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($solicitudes as $s) {
              if ($s['status_elevador'] == 0) {
                $fecha_solicitud = date('d-m-Y', strtotime($s['fecha']));
                $titulo = $s['form'];

                if ($s['status_elevador'] == 0) {
                  $estado = "PENDIENTE";
                  $estadocolor = "#ffc14d";
                } elseif ($s['status_elevador'] == 1) {
                  $estado = "APROBADO";
                  $estadocolor = "#00b300";
                } elseif ($s['status_elevador'] == 2) {
                  $estado = "DENEGADO";
                  $estadocolor = "#ff0000";
                }
            ?>
                <tr>
                  <td style="padding-top: 15px;"><?= $s['nombre_oficina'] ?></td>
                  <td style="padding-top: 15px;"><?= $titulo ?></td>
                  <td style="text-align: center; padding-top: 15px;"><?= $fecha_solicitud ?></td>
                  <td style="text-align: center; padding-top: 15px;"><?= $s['horario'] ?></td>
                  <td style="text-align: center; background-color: <?= $estadocolor ?>; color: #fff; padding-top: 15px;"><?= $estado ?></td>
                  <td style="width: 100px; text-align: center; padding-top: 15px;">
                    <form method="POST" action="<?= base_url('elevadores/estatus_change_elevadores') ?>">
                      <input type="hidden" name="ids" value="<?= $s['id'] ?>">
                      <button style="cursor: pointer;" type="submit" name="aprobar_elevador" class="btn btn-sm btn-success"><i class="fa fa-check"></i></button>
                      <button style="cursor: pointer;" type="submit" name="negar_elevador" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                    </form>
                  </td>
                </tr>
                </tr>
            <?php }
            } ?>
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->
  </div><!-- col-6 -->
</div>

<div class="row row-sm mg-t-20">
  <div class="col-xl-12 mg-t-25 mg-xl-t-0">
    <div class="card pd-10 pd-sm-10 form-layout form-layout-5">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Solicitudes aprobadas</h6>
      <div class="table-wrapper">
        <table id="datatable3" class="table table-condensed table-bordered display table-dark responsive nowrap">
          <thead>
            <tr>
              <th>Oficina</th>
              <th>Tipo</th>
              <th style="width: 90px;">Fecha Solicitud</th>
              <th style="width: 60px;">Horario</th>
              <th style="width: 60px;">Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($solicitudes as $s) {
              if ($s['status_elevador'] == 1) {
                $fecha_solicitud = date('d-m-Y H:i', strtotime($s['fecha']));
                $titulo = $s['form'];

                if ($s['status_elevador'] == 0) {
                  $estado = "PENDIENTE";
                  $estadocolor = "#ffc14d";
                } elseif ($s['status_elevador'] == 1) {
                  $estado = "APROBADO";
                  $estadocolor = "#00b300";
                } elseif ($s['status_elevador'] == 2) {
                  $estado = "DENEGADO";
                  $estadocolor = "#ff0000";
                }
            ?>
                <tr>
                  <td style="padding-top: 15px;"><?= $s['nombre_oficina'] ?></td>
                  <td style="padding-top: 15px;"><?= $titulo ?></td>
                  <td style="text-align: center; padding-top: 15px;"><?= $fecha_solicitud ?></td>
                  <td style="text-align: center; padding-top: 15px;"><?= $s['horario'] ?></td>
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

<div class="row row-sm mg-t-20">
  <div class="col-xl-12 mg-t-25 mg-xl-t-0">
    <div class="card pd-10 pd-sm-10 form-layout form-layout-5">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Solicitudes denegadas</h6>
      <div class="table-wrapper">
        <table id="datatable4" class="table table-condensed table-bordered display table-dark responsive nowrap">
          <thead>
            <tr>
              <th>Oficina</th>
              <th>Tipo</th>
              <th style="width: 90px;">Fecha Solicitud</th>
              <th style="width: 60px;">Horario</th>
              <th style="width: 60px;">Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($solicitudes as $s) {
              if ($s['status_elevador'] == 2) {
                $fecha_solicitud = date('d-m-Y H:i', strtotime($s['fecha']));
                $titulo = $s['form'];

                if ($s['status_elevador'] == 0) {
                  $estado = "PENDIENTE";
                  $estadocolor = "#ffc14d";
                } elseif ($s['status_elevador'] == 1) {
                  $estado = "APROBADO";
                  $estadocolor = "#00b300";
                } elseif ($s['status_elevador'] == 2) {
                  $estado = "DENEGADO";
                  $estadocolor = "#ff0000";
                }
            ?>
                <tr>
                  <td style="padding-top: 15px;"><?= $s['nombre_oficina'] ?></td>
                  <td style="padding-top: 15px;"><?= $titulo ?></td>
                  <td style="text-align: center; padding-top: 15px;"><?= $fecha_solicitud ?></td>
                  <td style="text-align: center; padding-top: 15px;"><?= $s['horario'] ?></td>
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