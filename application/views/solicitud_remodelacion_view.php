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
          <span>Su solicitud ha sido enviada exitosamente. Está pendiente de aprobación.</span>
        </div><!-- d-flex -->
      </div><!-- alert -->
    <?php
    }
    ?>
    <div class="card pd-10 pd-sm-10">
      <div class="row">
        <div class="col-xl-6">
          <h5>CONDICIONES PARA SOLICITAR REMODELACION</h5>
          <p>Los trabajos de remodelación deben de ser autorizado previamente por el Órgano Administrador, debiendo cumplir con lo establecido en los Manuales de Operación del Empresarial Zona Pradera, los requisitos son:</p>
          <ol>
            <li>Carta de solicitud para llevar a cabo remodelación firmada y sellada por el Representante Legal con la siguiente información (puede encontrar la plantilla en la sección Archivos PDF):
              <ul>
                <li>Nombre de la Empresa.</li>
                <li>Torre y número de oficina.</li>
                <li>Fecha inicial y final de remodelación inicial.</li>
                <li>Empresa encargada del proyecto y contacto del responsable de la remodelación.</li>
                <li>Listado de personal a realizar los trabajos.</li>
              </ul>
            </li>
            <li>Plano actual de las oficinas</li>
            <li>Plano y fotomontaje de la propuesta de remodelación que se requiere.</li>
            <li>La solicitud de remodelación lleva un proceso de autorización de 5 días hábiles desde el momento en que esté completa la documentación de lo contrario no se podrá procesar la solicitud.</li>
            <li>Al ser aprobado recibirá una carta de autorización por el Órgano Administrador para iniciar la remodelación.</li>
          </ol>
        </div>
        <div class="col-xl-6">
          <h5>OBSERVACIONES</h5>
          <ol>
            <li>Para iniciar los trabajos de remodelación, el encargado de proyecto y/o contratista deberán de recibir una charla de remodelación en la que se le hará entrega de un marbete que indica que la remodelación está autorizada.</li>
            <li>En caso de ser necesario extender el tiempo de remodelación deberán actualizar el cronograma de actividades y compartirlo al correo de atencionalcliente@zonapradera.com.</li>
          </ol>
        </div>
      </div>
    </div>
    <br>
    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Solicitud de remodelación</h6>
			<?php
					// Obtener el día de la semana (1 = Lunes, 7 = Domingo)
					$dia = date('N');

					// Obtener la hora en formato de 24 horas (ej. 14 = 2 PM)
					$hora = date('G');

					// Verificar si está dentro del horario permitido
					$mostrarMensaje = true;

					if ($dia >= 1 && $dia <= 5) { // Lunes a Viernes
							if ($hora >= 8 && $hora < 18) {
									$mostrarMensaje = false;
							}
					} elseif ($dia == 6) { // Sábado
							if ($hora >= 8 && $hora < 13) {
									$mostrarMensaje = false;
							}
					}

					// Mostrar mensaje si aplica
					if ($mostrarMensaje) {
						echo "<div class='alert alert-danger' role='alert' style='text-align: center; font-size: 18px; border-radius: 6px; border: 2px solid #b51f2e;'>El horario permitido es de Lunes a Viernes de 8 AM a 6 PM y Sábado de 8 AM a 1 PM.</div>";
					}else{
					?>
					<form method="POST" id="solremode" action="<?= base_url('remodelaciones') ?>" enctype="multipart/form-data">
						<div class="form">
							<?php
							$oficina = $this->intranet_model->get_oficina_single($_SESSION['idoficina']);
							?>
							<hr style="margin-top: 5px; margin-bottom: 10px;">
							<div class="row">
								<div class="col-md-6">
									<h5>Nombre Empresa</h5>
									<p style="margin-bottom: 5px;"><?= $oficina[0]['nombre_oficina'] ?></p>
								</div>
								<div class="col-md-3">
									<h5>Torre</h5>
									<p style="margin-bottom: 5px;"><?= $oficina[0]['torre'] ?></p>
								</div>
								<div class="col-md-3">
									<h5>Oficina</h5>
									<p style="margin-bottom: 5px;"><?= $oficina[0]['numero_oficina'] ?></p>
								</div>
							</div>
							<hr style="margin-top: 5px; margin-bottom: 5px;">
							<div class="row">
								<!-- <div class="col-lg-8">
									<div class="form-group">
										<label class="form-control-label">Título: <span class="tx-danger">*</span></label>
										<input class="form-control" type="text" name="titulo" value="" placeholder="Ingresar título de solicitud" required="true" autocomplete="off">
									</div>
								</div> -->
								<div class="col-lg-2">
									<div class="form-group">
										<label class="form-control-label">Torre: <span class="tx-danger">*</span></label>
										<select class="form-control select2" name="torre" data-placeholder="Selecciona">
											<option label="Selecciona"></option>
											<?php
											foreach ($torres as $t) {
											?>
												<option value="<?= $t['id_torres'] ?>"><?= $t['torre'] ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="form-group">
										<label class="form-control-label">Oficina: <span class="tx-danger">*</span></label>
										<input class="form-control" type="text" name="oficina" value="" placeholder="Ingresar no. oficina" required="true" autocomplete="off">
									</div>
								</div><!-- col-4 -->
								<div class="col-lg-3">
									<div class="form-group">
										<label class="form-control-label">Fecha Inicio: <span class="tx-danger">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
											<input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" placeholder="MM/DD/YYYY" required="true" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
										<label class="form-control-label">Fecha Fin: <span class="tx-danger">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
											<input type="date" id="fecha_fin" name="fecha_fin" class="form-control" placeholder="MM/DD/YYYY" required="true" autocomplete="off">
										</div>
									</div>
								</div>
								<input type="hidden" name="empresaid" value="<?= $_SESSION['idoficina'] ?>">

							</div><!-- row -->
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="form-control-label">Descripción: <span class="tx-danger">*</span></label>
										<textarea class="form-control" name="descripcion" required="true" autocomplete="off"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-9">
									<table class="table table-condensed">
										<tbody>
											<tr>
												<td>Carta formal. Archivo PDF. (Máximo 24MB) <span class="tx-danger">*</span></td>
												<td><input onchange="ValidateSize(this, 24)" type="FILE" name="file1" class="form-control" required="true"></td>
											</tr>
											<tr>
												<td>Plano actual. Archivo PDF. (Máximo 24MB) <span class="tx-danger">*</span></td>
												<td><input onchange="ValidateSize(this, 24)" type="FILE" name="file2" class="form-control" required="true"></td>
											</tr>
											<tr>
												<td>Plano propuesta de remodelación. Archivo PDF. (Máximo 24MB) <span class="tx-danger">*</span></td>
												<td><input onchange="ValidateSize(this, 24)" type="FILE" name="file3" class="form-control" required="true"></td>
											</tr>
											<tr>
												<td>Cronograma de actividades. Archivo PDF. (Máximo 24MB) <span class="tx-danger">*</span></td>
												<td><input onchange="ValidateSize(this, 24)" type="FILE" name="file4" class="form-control" required="true"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="form-layout-footer">
								<button type="submit" style="cursor: pointer;" name="enviar" class="btn btn-info mg-r-5">Enviar solicitud</button>
							</div><!-- form-layout-footer -->
						</div><!-- form-layout -->
					</form>
					<?php
					}
					?>
    </div>
  </div><!-- col-6 -->
</div><!-- row -->

<div class="row row-sm mg-t-20">
  <div class="col-xl-12 mg-t-25 mg-xl-t-0">
    <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Solicitudes</h6>
      <div class="table-wrapper">
        <table id="datatable2" class="table table-condensed table-bordered display table-dark responsive nowrap">
          <thead>
            <tr>
							<th style="width: 60px;">ID</th>
              <th></th>
              <th style="width: 90px;">Fecha <br> Inicio</th>
              <th style="width: 90px;">Fecha <br> Fin</th>
              <th style="width: 80px;">Torre</th>
              <th style="width: 80px;">Oficina</th>
              <th style="width: 40px;">Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($solicitudes as $s) {
              $fechainicio = date('d-m-Y', strtotime($s['fechainicio']));
              $fechafin = date('d-m-Y', strtotime($s['fechafin']));

              if ($s['status_remodelacion'] == 0) {
                $estado = "PENDIENTE";
                $estadocolor = "#ffc14d";
              } elseif ($s['status_remodelacion'] == 1) {
                $estado = "APROBADO";
                $estadocolor = "#00b300";
              } elseif ($s['status_remodelacion'] == 2) {
                $estado = "DENEGADO";
                $estadocolor = "#ff0000";
              } elseif ($s['status_remodelacion'] == 3) {
                $estado = "COMPLETADO";
                $estadocolor = "#00a6f5";
              }

            ?>
              <tr>
								<td style="text-align: center;"><?= $s['id'] ?></td>
                <td style="width:30px; text-align: center;">
									<a target="_blank" href="<?= base_url('solicitudes/solicitud_remodelaciones/' . $s['id']) ?>" class="btn btn-sm btn-default"><i class="fa fa-link"></i></a>
									<?php
									if($estado == "PENDIENTE") {
									?>
									<a href="<?= base_url('remodelaciones/editar_remodelaciones/' . $s['id']) ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
									<?php
									}
									?>
								</td>
                <td style="text-align: center; padding-top: 15px;"><?= $fechainicio ?></td>
                <td style="text-align: center; padding-top: 15px;"><?= $fechafin ?></td>
                <td style="text-align: center; padding-top: 15px;"><?= $s['torre'] ?></td>
                <td style="text-align: center; padding-top: 15px;"><?= $s['oficina'] ?></td>
                <td style="text-align: center; background-color: <?= @$estadocolor ?>; color: #fff; padding-top: 15px;"><?= $estado ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->
  </div><!-- col-6 -->
</div>
