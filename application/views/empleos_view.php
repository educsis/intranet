<style>
  table{
    font-size: 10px;
  }
</style>
<div class="row row-sm mg-t-10">
  <div class="col-xl-12 mg-t-25 mg-xl-t-0">
		<div class="card pd-10 pd-sm-20 form-layout form-layout-5">
			<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Solicitudes</h6>
			<div class="table-wrapper">
        <table id="datatable2" class="table table-condensed table-bordered display table-dark responsive nowrap">
          <thead>
            <tr>
							<th style="width: 60px;">ID</th>
              <th style="width: 60px;">Fecha <br> solicitud</th>
              <th style="width: 60px;">Fecha <br> aprobación</th>
              <th style="width: 60px;">Fecha <br> finaliza</th>
              <th>Título</th>
              <th>Categoría</th>
              <th style="width: 30px;">No.<br> aplic</th>
              <th style="width: 50px;">Estado</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach($empleos as $e){
              $fecha_solicitud = date('d-m-Y', strtotime($e['fecha_solicitud']));

              if($e['fecha_publicacion']){
                $fecha_aprobacion = date('d-m-Y', strtotime($e['fecha_publicacion']));
                $dias = $e['dias_publicacion'];
                $fecha_termina = date('d-m-Y', strtotime($e['fecha_publicacion'] . " + $dias days"));
              }else{
                $fecha_aprobacion = "PENDIENTE";
                $fecha_termina = "PENDIENTE";
              }

              $titulo = $e['titulo'];
              $categoria = $e['categoria'];
              $conteo_aplicaciones = $e['conteo'];

              // 0=desactivada, 1=pendiente aprovacion, 2=activa, 3=pausa
              if($e['status_plaza'] == 0){
                $estado = "INACTIVA";
                $estadocolor = "#bbbcbc";
              }elseif($e['status_plaza'] == 1){
                $estado = "PENDIENTE";
                $estadocolor = "#fd5f52";
              }elseif($e['status_plaza'] == 2){
                $estado = "ACTIVA";
                $estadocolor = "#0f4493";
              }elseif($e['status_plaza'] == 3){
                $estado = "PAUSA";
                $estadocolor = "#f1d965";
              }

              $color_pendiente = "#fd5f52";
              $color_desactivado = "#bbbcbc";
              $color_pausa = "#f1d965";
              $color_activo = "#0f4493";


            ?>
            <tr>
							<td style="text-align: center;"><?= $e['id_plaza'] ?></td>
              <td style="text-align: center;"><?= $fecha_solicitud ?></td>
              <td style="text-align: center;"><?= $fecha_aprobacion ?></td>
              <td style="text-align: center;"><?= $fecha_termina ?></td>
              <td><?= $titulo ?></td>
              <td><?= $categoria ?></td>
              <td style="text-align: center; width: 30px;"><?= $conteo_aplicaciones ?></td>
              <td style="text-align: center; background-color: <?= $estadocolor ?>; color: #fff;"><?= $estado ?></td>
              <td style="width: 140px; text-align: center;">
                <a href="<?= base_url('empleos/editar_empleo/' . $e['id_plaza']) ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
              <?php
                if($e['fecha_publicacion']){
              ?>
                <?php
                  if($e['status_plaza'] == 2){
                ?>
                <form method="POST" style="display: inline-table;">
                  <input type="hidden" name="idempleo" value="<?= $e['id_plaza'] ?>">
                  <button type="submit" style="cursor: pointer;" name="pausa" class="btn btn-sm btn-success"><i class="fa fa-pause"></i></button>
                </form>
                <?php
                  }elseif($e['status_plaza'] == 3){
                ?>
                <form method="POST" style="display: inline-table;">
                  <input type="hidden" name="idempleo" value="<?= $e['id_plaza'] ?>">
                  <button type="submit" style="cursor: pointer;" name="nopausa" class="btn btn-sm btn-default"><i class="fa fa-play"></i></button>
                </form>
                <?php
                  }
                ?>
                <a href="<?= 'http://zonapradera.com/empleos/empleo/' . $e['id_plaza'] ?>" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
              <?php
                }
              ?>
                <!-- <form method="POST" style="display: inline-table;">
                  <input type="hidden" name="idempleo" value="<?= $e['id_plaza'] ?>">
                  <button type="submit" name="eliminar" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                </form> -->
                <a href="javascript:void(0);" class="btn btn-sm btn-danger delete" data-tabla="plazas" data-titulo="una plaza, una vez eliminada, no se recuperara." data-id="<?= $e['id_plaza'] ?>"><i class="fa fa-trash"></i></a>
                <!-- <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> -->
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div><!-- table-wrapper -->
		</div><!-- card -->
	</div><!-- col-6 -->
</div>
