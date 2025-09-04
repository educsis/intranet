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
              <th>Oficina</th>
              <th>Tipo</th>
              <th style="width: 60px;">Torre</th>
              <th style="width: 60px;">Oficina</th>
              <th style="width: 90px;">Fecha Solicitud</th>
              <th style="width: 60px;">Horario</th>
              <th style="width: 60px;">Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($solicitudes as $s) {
              if ($s['status_elevador'] == 3) {
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
                } elseif ($s['status_elevador'] == 3) {
                  $estado = "COMPLETADO";
                  $estadocolor = "#00a6f5";
                }

                if($s['id_torre'] == 1){
                  $torre = 'Torre I';
                }elseif($s['id_torre'] == 2){
                  $torre = 'Torre II';
                }elseif($s['id_torre'] == 3){
                  $torre = 'Torre III';
                }elseif($s['id_torre'] == 4){
                  $torre = 'Torre IV';
                }
            ?>
                <tr>
									<td style="text-align: center;"><?= $s['id'] ?></td>
                  <td style="width:30px; text-align: center;"><a target="_blank" href="<?= base_url('solicitudes/solicitud_elevador/' . $s['id']) ?>" class="btn btn-sm btn-default"><i class="fa fa-link"></i></a></td>
                  <td style="padding-top: 15px;"><?= $s['nombre_oficina'] ?></td>
                  <td style="padding-top: 15px;"><?= $titulo ?></td>
                  <td style="text-align: center; padding-top: 15px;"><?= $torre ?></td>
                  <td style="text-align: center; padding-top: 15px;"><?= $s['numero_oficina'] ?></td>
                  <td style="text-align: center; padding-top: 15px; width: 200px;"><?= $fecha_solicitud ?></td>
                  <td style="text-align: center; padding-top: 15px; width: 200px;"><?= $s['horario'] ?></td>
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
