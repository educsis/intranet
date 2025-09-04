<style>
  tbody>tr>td {
    font-size: 1rem;
    color: #000;
  }
</style>
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
    <div class="card pd-20 pd-sm-40">
      <div class="row optionsForm">
        <div class="col-md-6">
          <br>
          <br>
          <p>
            En esta sección encontrará las opciones de: Ingreso y Salida de inquilino o propietario, así como procedimiento para reportar Cambio de Propietario. Los formularios y plantillas de cartas los puede encontrar en la sección <a target="_blank" href="<?= base_url('archivos') ?>">Archivos PDF</a>.
          </p>
        </div>
        <div class="col-md-6" style="text-align: center;">
          <h3 class="text-center">Seleccione el tipo de solicitud</h3>
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
						<a href="#" data-form="ingresoInquilino" class="selForm btn btn-info btn-lg" style="width: 350px; margin: 10px auto;">Ingreso de Inquilino / Propietario</a>
						<a href="#" data-form="salidaInquilinoPropietario" class="selForm btn btn-info btn-lg" style="width: 350px; margin: 10px auto;">Salida de Inquilino / Propietario</a>
						<a href="#" data-form="salidaInquilino" class="selForm btn btn-info btn-lg" style="width: 350px; margin: 10px auto;">Cambio de propietario</a>
					<?php
					}
					?>
        </div>
      </div>
      <div class="row ingresoInquilino optionsForm formE" style="display: none;">
        <div class="col-md-6" style="text-align: center;">
          <h3 class="text-center">Seleccione el tipo de solicitud</h3>
          <a href="#" data-form="ingresoSA" class="selForm btn btn-info btn-lg" style="width: 350px; margin: 10px auto;">Inquilino Sociedad Anonima</a>
          <a href="#" data-form="ingresoIndividual" class="selForm btn btn-info btn-lg" style="width: 350px; margin: 10px auto;">Persona Individual</a>
          <a href="<?= base_url('mudanzas') ?>" class="btn btn-lg" style="color: #fff; background-color: #777; width: 350px; margin: 10px auto;">
            REGRESAR</a>
        </div>
        <div class="col-md-6">
          <br>
          <br>
          <p>
            En esta sección encontrará las opciones de: Ingreso y Salida de inquilino o propietario, así como procedimiento para reportar Cambio de Propietario. Los formularios y plantillas de cartas los puede encontrar en la sección Archivos PDF.
          </p>
        </div>
      </div>
      <div class="row salidaInquilino optionsForm formE" style="display: none;">
        <div class="col-md-6" style="text-align: center;">
          <h3 class="text-center">Cambio de propietario</h3>
          <a href="#" data-form="cambioPropietario" class="selForm btn btn-info btn-lg" style="width: 350px; margin: 10px auto;">Cambio Sociedad Anonima</a>
          <a href="#" data-form="cambioIndividual" class="selForm btn btn-info btn-lg" style="width: 350px; margin: 10px auto;">Cambio persona individual</a>
          <a href="<?= base_url('mudanzas') ?>" class="btn btn-lg" style="color: #fff; background-color: #777; width: 350px; margin: 10px auto;">
            REGRESAR</a>
        </div>
        <div class="col-md-6">
          <br>
          <br>
          <p>
            En esta sección encontrará las opciones de: Ingreso y Salida de inquilino o propietario, así como procedimiento para reportar Cambio de Propietario. Los formularios y plantillas de cartas los puede encontrar en la sección Archivos PDF.
          </p>
        </div>
      </div>
      <form method="POST" class="ingresoSA formE" action="<?= base_url('mudanzas') ?>" style="display: none;" enctype="multipart/form-data">
        <div class="form">
          <h2 class="text-success">INGRESO DE INQUILINO/PROPIETARIO SOCIEDAD ANONIMA</h2>
          <hr style="margin-top: 5px; margin-bottom: 10px;">
          <input type="hidden" name="empresaid" value="<?= $_SESSION['idoficina'] ?>">
          <?php
          $oficina = $this->intranet_model->get_oficina_single($_SESSION['idoficina']);
          ?>
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
            <div class="col-md-12">
              <table class="table table-condensed">
                <tbody>
                  <tr>
                    <td>Carta del propietario autorizando el ingreso de inquilino, el documento debe indicar si hay cambios en la facturación. *</td>
                    <td><input type="FILE" name="file1" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Ficha de datos generales de la empresa. *</td>
                    <td><input type="FILE" name="file2" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Formato de Nuevo Inquilino (FNI) firmado por el representante legal de la empresa arrendataria. *</td>
                    <td><input type="FILE" name="file3" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Copia de nombramientos vigentes de la sociedad arrendataria o nueva adquiriente. *</td>
                    <td><input type="FILE" name="file4" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Copia de DPI del representante legal. *</td>
                    <td><input type="FILE" name="file5" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Copia de RTU. *</td>
                    <td><input type="FILE" name="file6" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Copia de patente de comercio. *</td>
                    <td><input type="FILE" name="file7" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Copia de la escritura de arrendamiento. *</td>
                    <td><input type="FILE" name="file8" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Logo de la empresa en formato .jpg</td>
                    <td><input type="FILE" name="file9" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Copia de póliza de Responsabilidad Civil. *</td>
                    <td><input type="FILE" name="file10" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Completar formulario de Censo.</td>
                    <td><input type="FILE" name="file10" class="form-control" required="required"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="form-layout-footer">
            <button type="submit" style="cursor: pointer;" name="enviar_ingreso_sociedad_anonima" class="btn btn-info mg-r-5">Enviar solicitud</button>
            <a href="#" style="cursor: pointer;" class="btn btn-default mg-r-5 cancelarMudanza">Cancelar</a>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
      </form>
      <form method="POST" class="ingresoIndividual formE" action="<?= base_url('mudanzas') ?>" style="display: none;" enctype="multipart/form-data">
        <div class="form">
          <h2 class="text-success">INGRESO DE INQUILINO/PROPIETARIO PERSONA INDIVIDUAL</h2>
          <hr style="margin-top: 5px; margin-bottom: 10px;">
          <input type="hidden" name="empresaid" value="<?= $_SESSION['idoficina'] ?>">
          <?php
          $oficina = $this->intranet_model->get_oficina_single($_SESSION['idoficina']);
          ?>
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
            <div class="col-md-12">
              <table class="table table-condensed">
                <tbody>
                  <tr>
                    <td>Carta del propietario autorizando el ingreso de inquilino, el documento debe indicar si hay cambios en la facturación. *</td>
                    <td><input type="FILE" name="file1" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Ficha de datos generales de la empresa. *</td>
                    <td><input type="FILE" name="file2" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Formato de Nuevo Inquilino (FNI) firmado por la empresa arrendataria. *</td>
                    <td><input type="FILE" name="file3" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Copia de DPI persona individual. *</td>
                    <td><input type="FILE" name="file4" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Copia de RTU. *</td>
                    <td><input type="FILE" name="file5" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Copia de la escritura de arrendamiento. *</td>
                    <td><input type="FILE" name="file6" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Logo de la empresa en formato .jpg. *</td>
                    <td><input type="FILE" name="file7" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Copia de póliza de Responsabilidad Civil. *</td>
                    <td><input type="FILE" name="file8" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Completar formulario de Censo. *</td>
                    <td><input type="FILE" name="file9" class="form-control" required="required"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="form-layout-footer">
            <button type="submit" style="cursor: pointer;" name="enviar_ingreso_individual" class="btn btn-info mg-r-5">Enviar solicitud</button>
            <a href="#" style="cursor: pointer;" class="btn btn-default mg-r-5 cancelarMudanza">Cancelar</a>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
      </form>
      <form method="POST" class="cambioPropietario formE" action="<?= base_url('mudanzas') ?>" style="display: none;" enctype="multipart/form-data">
        <div class="form">
          <h2 class="text-success">CAMBIO DE PROPIETARIO – SOCIEDAD ANONIMA</h2>
          <hr style="margin-top: 5px; margin-bottom: 10px;">
          <input type="hidden" name="empresaid" value="<?= $_SESSION['idoficina'] ?>">
          <?php
          $oficina = $this->intranet_model->get_oficina_single($_SESSION['idoficina']);
          ?>
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
            <div class="col-md-12">
              <table class="table table-condensed">
                <tbody>
                  <tr>
                    <td>Carta del antiguo propietario informando la venta de la oficina, el documento debe indicar si hay cambios en la facturación. *</td>
                    <td><input type="FILE" name="file1" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Ficha de datos generales del nuevo propietario. *</td>
                    <td><input type="FILE" name="file2" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Formato de Nuevo Propietario (FNP) firmado por el representante legal. *</td>
                    <td><input type="FILE" name="file3" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Copia de la escritura de compraventa. *</td>
                    <td><input type="FILE" name="file4" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Copia de los nombramientos vigentes de la sociedad arrendataria o nueva adquiriente. *</td>
                    <td><input type="FILE" name="file5" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Copia DPI representante legal. *</td>
                    <td><input type="FILE" name="file6" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Copia de patente de comercio. *</td>
                    <td><input type="FILE" name="file7" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Copia de RTU. *</td>
                    <td><input type="FILE" name="file8" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Copia de póliza de Responsabilidad Civil. *</td>
                    <td><input type="FILE" name="file9" class="form-control" required="required"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="form-layout-footer">
            <button type="submit" style="cursor: pointer;" name="enviar_cambiosa" class="btn btn-info mg-r-5">Enviar solicitud</button>
            <a href="#" style="cursor: pointer;" class="btn btn-default mg-r-5 cancelarMudanza">Cancelar</a>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
      </form>
      <form method="POST" class="cambioIndividual formE" action="<?= base_url('mudanzas') ?>" style="display: none;" enctype="multipart/form-data">
        <div class="form">
          <h2 class="text-success">CAMBIO DE PROPIETARIO – PERSONA INDIVIDUAL</h2>
          <hr style="margin-top: 5px; margin-bottom: 10px;">
          <input type="hidden" name="empresaid" value="<?= $_SESSION['idoficina'] ?>">
          <?php
          $oficina = $this->intranet_model->get_oficina_single($_SESSION['idoficina']);
          ?>
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
            <div class="col-md-12">
              <table class="table table-condensed">
                <tbody>
                  <tr>
                    <td>Carta del antiguo propietario informando la venta de la oficina, el documento debe indicar si hay cambios en la facturación. *</td>
                    <td><input type="FILE" name="file1" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Ficha de datos generales del nuevo propietario. *</td>
                    <td><input type="FILE" name="file2" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Formato de Nuevo Propietario (FNP) firmado por la empresa. *</td>
                    <td><input type="FILE" name="file3" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Copia de la escritura de compraventa. *</td>
                    <td><input type="FILE" name="file4" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Copia DPI de persona individual. *</td>
                    <td><input type="FILE" name="file5" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Copia de RTU. *</td>
                    <td><input type="FILE" name="file6" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Copia de póliza de Responsabilidad Civil. *</td>
                    <td><input type="FILE" name="file7" class="form-control" required="required"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="form-layout-footer">
            <button type="submit" style="cursor: pointer;" name="enviar_cambio_individual" class="btn btn-info mg-r-5">Enviar solicitud</button>
            <a href="#" style="cursor: pointer;" class="btn btn-default mg-r-5 cancelarMudanza">Cancelar</a>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
      </form>
      <form method="POST" class="salidaInquilinoPropietario formE" action="<?= base_url('mudanzas') ?>" style="display: none;" enctype="multipart/form-data">
        <div class="form">
          <h2 class="text-success">SALIDA DE INQUILINO</h2>
          <hr style="margin-top: 5px; margin-bottom: 10px;">
          <input type="hidden" name="empresaid" value="<?= $_SESSION['idoficina'] ?>">
          <?php
          $oficina = $this->intranet_model->get_oficina_single($_SESSION['idoficina']);
          ?>
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
            <div class="col-md-12">
              <table class="table table-condensed">
                <tbody>
                  <tr>
                    <td>Carta del propietario autorizando la salida de inquilino, el documento debe indicar si hay cambios en la facturación. *</td>
                    <td><input type="FILE" name="file1" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Formato de Salida de Inquilino (FSI) firmado por el propietario de la oficina. *</td>
                    <td><input type="FILE" name="file2" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Solvencia de la cuota de mantenimiento emitida por el Departamento de Facturación y Cobros de Zona Pradera. (facturacionycobros@zonapradera.com). *</td>
                    <td><input type="FILE" name="file3" class="form-control" required="required"></td>
                  </tr>
                  <tr>
                    <td>Listado de actualización de tarjetas. *</td>
                    <td><input type="FILE" name="file4" class="form-control" required="required"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="form-layout-footer">
            <button type="submit" style="cursor: pointer;" name="enviar_salida_inquilino" class="btn btn-info mg-r-5">Enviar solicitud</button>
            <a href="#" style="cursor: pointer;" class="btn btn-default mg-r-5 cancelarMudanza">Cancelar</a>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
      </form>
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
              <th>Tipo</th>
              <th style="width: 130px;">Fecha solicitud</th>
              <th style="width: 80px;">Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($solicitudes as $s) {
              $fecha_solicitud = date('d-m-Y', strtotime($s['fecha']));
              $tipo = $s['tipo'];

							$tipoForm = 0;

							if($tipo == 'INGRESO DE INQUILINO/PROPIETARIO SOCIEDAD ANONIMA'){
								$tipoForm = 1;
							}

							if($tipo == 'INGRESO DE INQUILINO/PROPIETARIO PERSONA INDIVIDUAL'){
								$tipoForm = 2;
							}

							if($tipo == 'SALIDA DE INQUILINO'){
								$tipoForm = 3;
							}

							if($tipo == 'CAMBIO DE PROPIETARIO – SOCIEDAD ANONIMA'){
								$tipoForm = 4;
							}

							if($tipo == 'CAMBIO DE PROPIETARIO – PERSONA INDIVIDUAL'){
								$tipoForm = 5;
							}

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
                <td style="width:30px; text-align: center;">
									<a target="_blank" href="<?= base_url('solicitudes/solicitud_mudanzas/' . $s['id']) ?>" class="btn btn-sm btn-default"><i class="fa fa-link"></i></a>
									<?php
									if($estado == "PENDIENTE") {
									?>
									<a href="<?= base_url('mudanzas/editar_mudanzas/' . $s['id'] . '/' . $tipoForm) ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
									<?php
									}
									?>
								</td>
                <td style="padding-top: 15px;"><?= $tipo ?></td>
                <td style="text-align: center; padding-top: 15px;"><?= $fecha_solicitud ?></td>
                <td style="text-align: center; background-color: <?= @$estadocolor ?>; color: #fff; padding-top: 15px;"><?= $estado ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->
  </div><!-- col-6 -->
</div>
