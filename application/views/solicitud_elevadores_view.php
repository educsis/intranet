<style>
  label {
    font-weight: bold;
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
      <!-- <h3>Solicitud de elevador</h3>
      <hr> -->
      <div class="row optionsForm">
        <div class="col-md-6">
          <p>Seleccione el tipo de uso de elevador de carga que requiere. El objetivo es equilibrar la carga para optimizar el servicio del equipo.</p>
          <ul>
            <li><strong>Carga Pequeña:</strong> Carga moderada que ocupe únicamente 1 servicio de elevador, por ejemplo: Cajas pequeñas, papelería, insumos, entre otros. Horarios: Lunes a Viernes de 9:00 a 12:00 horas, 14:00 a 17:00 horas. Sábado: 8:00 a 12:00 horas.</li>
            <li><strong>Carga Grande:</strong> Carga pesada que ocupe más de 1 servicio de elevador, ejemplo: Mobiliario, cajas grandes, equipos, productos, entre otros. Horarios: Lunes a Viernes a partir de las 19:00 horas a las 06:00 horas del siguiente día. Sábados de 14:00 horas en adelante. Domingo: Todo el día.</li>
            <li><strong>Trabajos Internos:</strong> El uso de elevador será para el ingreso del personal con sus herramientas de trabajo. Especifique el tipo de trabajo que se realizará en la oficina: Mantenimiento de equipos, reparaciones o remodelaciones. Horarios: Lunes a Viernes de 9:00 a 12:00 horas, 14:00 a 17:00 horas. Sábado de 8:00 a 12:00 horas. Los trabajos con ruido y olor son permitidos en horario de Lunes a Viernes a partir de las 19:00 horas a las 06:00 horas del siguiente día. Sábados a partir de las 14:00 horas y Domingo todo el día.</li>
            <li><strong>Mudanzas:</strong> El uso de elevador será para traslado de mobiliario y equipo, por ingreso o salida de inquilino o propietarios. Horarios: Lunes a Viernes a partir de las 19:00 horas a las 06:00 horas del siguiente día. Sábados de 14:00 horas en adelante y Domingo todo el día.</li>
          </ul>
          <p>Nota: Se cuenta con un elevador de carga para una torre y está sujeto a la disponiblidad. Las dimensiones del elevador son: Altura 2.30 mts, ancho 2.00 mts y fondo 1.35 mts y el peso máximo es de 1,800kg.</p>
        </div>
        <div class="col-md-6">
          <h3 class="text-center">Seleccione tipo de uso</h3>
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
					<a href="#" data-form="pequenaForm" class="selForm btn btn-info btn-lg btn-block" style="width: 350px; margin: 10px auto;">Carga pequeña</a>
          <a href="#" data-form="grandeForm" class="selForm btn btn-info btn-lg btn-block" style="width: 350px; margin: 10px auto;">Carga grande</a>
          <a href="#" data-form="internosForm" class="selForm btn btn-info btn-lg btn-block" style="width: 350px; margin: 10px auto;">Trabajos internos</a>
          <a href="#" data-form="mudanzaForm" class="selForm btn btn-info btn-lg btn-block" style="width: 350px; margin: 10px auto;">Mudanza</a>
					<?php
					}
					?>          
        </div>
      </div>
      <form class="internosForm formE" method="POST" action="<?= base_url('elevadores') ?>" style="display: none;">
        <div class="form">
          <input type="hidden" name="empresaid" value="<?= $_SESSION['idoficina'] ?>">
          <?php
          $oficina = $this->intranet_model->get_oficina_single($_SESSION['idoficina']);
          ?>
          <h2 class="text-success">Trabajos internos</h2>
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
            <div class="col-md-3 form-group">
              <label>* Propietario – Inquilino</label>
              <select name="tipo" class="form-control tiposel">
                <option value="0">Selecciona una opción</option>
                <option value="propietario">Propietario</option>
                <option value="inquilino">Inquilino</option>
              </select>
            </div>
            <div class="col-md-3 form-group">
              <label>* Fecha que requiere elevador</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input type="date" name="fecha" class="form-control" placeholder="MM/DD/YYYY" required="true" autocomplete="off">
              </div>
            </div>
            <div class="col-md-3 form-group">
              <label>* Horario Solicitado</label>
              <select name="horario" class="form-control horariosel">
                <option value="0">Selecciona una opción</option>
                <option value="09:00 a 12:00 horas">09:00 a 12:00 horas</option>
                <option value="14:00 a 17:00 horas">14:00 a 17:00 horas</option>
                <option value="19:00 a 06:30 horas">19:00 a 06:30 horas</option>
              </select>
            </div>
            <div class="col-md-3 form-group">
              <label>* Tipo de trabajo</label>
              <select name="requerimiento" class="form-control trabajosel">
                <option value="0">Selecciona una opción</option>
                <option value="Reparaciones">Reparaciones</option>
                <option value="Mantenimiento">Mantenimiento</option>
                <option value="Remodelación">Remodelación</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label>* Tipo de Carga</label>
              <div class="row">
                <div class="col-md-1"></div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="mobiliario" id="carga1">
                  <label class="form-check-label" for="carga1" style="padding-left: 0px;">
                    Mobiliario
                  </label>
                </div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="equipo" id="carga2">
                  <label class="form-check-label" for="carga2" style="padding-left: 0px;">
                    Equipo
                  </label>
                </div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="productos" id="carga3">
                  <label class="form-check-label" for="carga3" style="padding-left: 0px;">
                    Productos
                  </label>
                </div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="material" id="carga4">
                  <label class="form-check-label" for="carga4" style="padding-left: 0px;">
                    Material
                  </label>
                </div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="desechos" id="carga5">
                  <label class="form-check-label" for="carga5" style="padding-left: 0px;">
                    Desechos
                  </label>
                </div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="otros" id="carga6">
                  <label class="form-check-label" for="carga6" style="padding-left: 0px;">
                    Otros
                  </label>
                </div>
              </div>
            </div>
          </div>
          <hr style="margin-top: 5px; margin-bottom: 10px;">
          <h5>Descripción de la carga</h5>
          <div class="row">
            <div class="col-md-12 form-group">
              <label>* Motivo de retiro, ingreso o traslado</label>
              <input type="text" class="form-control" name="motivo" required="true" autocomplete="off">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label>* Detalle</label>
              <textarea class="form-control" name="detalle" required="true"></textarea>
            </div>
          </div>
          <hr style="margin-top: 5px; margin-bottom: 10px;">
          <h5>Datos del proveedor y/o contratista</h5>
          <div class="row">
            <div class="col-md-8 form-group">
              <label>* Nombre Empresa</label>
              <input type="text" name="empresa_proveedor" class="form-control" required="true" autocomplete="off">
            </div>
          </div>
          <h5>Datos Vehículo</h5>
          <div class="row">
            <div class="col-md-4 form-group">
              <label>* Marca</label>
              <input type="text" name="marca1" class="form-control" required="true" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>* Color</label>
              <input type="text" name="color1" class="form-control" required="true" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>* Placa</label>
              <input type="text" name="placa1" class="form-control" required="true" autocomplete="off">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group">
              <label>Marca</label>
              <input type="text" name="marca2" class="form-control" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>Color</label>
              <input type="text" name="color2" class="form-control" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>Placa</label>
              <input type="text" name="placa2" class="form-control" autocomplete="off">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group">
              <label>Marca</label>
              <input type="text" name="marca3" class="form-control" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>Color</label>
              <input type="text" name="color3" class="form-control" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>Placa</label>
              <input type="text" name="placa3" class="form-control" autocomplete="off">
            </div>
          </div>
          <hr>
          <h5>Listado de Personal</h5>
          <div class="wrapper-listado">
            <div class="row">
              <div class="col-md-9 form-group">
                <label>* Nombre</label>
                <input name="personal_name[]" class="form-control" required="true" autocomplete="off">
              </div>
              <div class="col-md-2 form-group">
                <label>* DPI</label>
                <input name="personal_dpi[]" class="form-control" required="true" autocomplete="off">
              </div>
              <div class="col-md-1 form-group">
                <a href="javascript:void(0);" class="btn btn-success add_more_listado" style="margin-top:30px;"><i class="fa fa-plus-circle"></i></a>
              </div>
            </div>
          </div>
          <hr style="margin-top: 5px; margin-bottom: 10px;">
          <h5>Datos de la persona que autoriza</h5>
          <div class="row">
            <div class="col-md-4 form-group">
              <label>* Nombre</label>
              <input name="autorizanombre" class="form-control" required="true" autocomplete="off">
            </div>
            <div class="col-md-3 form-group">
              <label>* Cargo</label>
              <input name="autorizacargo" class="form-control" required="true" autocomplete="off">
            </div>
            <div class="col-md-2 form-group">
              <label>* Teléfono</label>
              <input name="autorizatelefono" class="form-control" required="true" autocomplete="off">
            </div>
            <div class="col-md-3 form-group">
              <label>* Email</label>
              <input type="email" name="autorizaemail" class="form-control" required="true" autocomplete="off">
            </div>
          </div>
          <div class="form-layout-footer">
            <button type="submit" style="cursor: pointer;" name="enviarInternos" class="btn btn-info mg-r-5">Enviar solicitud</button>
            <a href="#" style="cursor: pointer;" class="btn btn-default mg-r-5 cancelarElevador">Cancelar</a>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
      </form>
      <form class="pequenaForm formE" method="POST" action="<?= base_url('elevadores') ?>" style="display: none;">
        <div class="form">
          <input type="hidden" name="empresaid" value="<?= $_SESSION['idoficina'] ?>">
          <?php
          $oficina = $this->intranet_model->get_oficina_single($_SESSION['idoficina']);
          ?>
          <h2 class="text-success">Carga pequeña</h2>
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
            <div class="col-md-3 form-group">
              <label>* Propietario – Inquilino</label>
              <select name="tipo" class="form-control">
                <option value="" selected="selected" disabled="disabled" required="required">Selecciona una opción</option>
                <option value="propietario">Propietario</option>
                <option value="inquilino">Inquilino</option>
              </select>
            </div>
            <div class="col-md-3 form-group">
              <label>* Fecha que requiere elevador</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input type="date" name="fecha" class="form-control" placeholder="MM/DD/YYYY" required="true" autocomplete="off">
              </div>
            </div>
            <div class="col-md-3 form-group">
              <label>* Horario Solicitado</label>
              <select name="horario" class="form-control">
                <option value="" selected="selected" disabled="disabled" required="required">Selecciona una opción</option>
                <option value="09:00 a 12:00 horas">09:00 a 12:00 horas</option>
                <option value="14:00 a 17:00 horas">14:00 a 17:00 horas</option>
                <option value="19:00 a 06:30 horas">19:00 a 06:30 horas</option>
              </select>
            </div>
            <div class="col-md-3 form-group">
              <label>* Tipo Requerimiento</label>
              <select name="requerimiento" class="form-control">
                <option value="" selected="selected" disabled="disabled" required="required">Selecciona una opción</option>
                <option value="Ingreso">Ingreso</option>
                <option value="Retiro">Retiro</option>
                <option value="Traslado dentro de Zona Pradera">Traslado dentro de Zona Pradera</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label>* Tipo de Carga</label>
              <div class="row">
                <div class="col-md-1"></div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="mobiliario" id="carga7">
                  <label class="form-check-label" for="carga7" style="padding-left: 0px;">
                    Mobiliario
                  </label>
                </div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="equipo" id="carga8">
                  <label class="form-check-label" for="carga8" style="padding-left: 0px;">
                    Equipo
                  </label>
                </div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="productos" id="carga9">
                  <label class="form-check-label" for="carga9" style="padding-left: 0px;">
                    Productos
                  </label>
                </div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="material" id="carga10">
                  <label class="form-check-label" for="carga10" style="padding-left: 0px;">
                    Material
                  </label>
                </div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="desechos" id="carga11">
                  <label class="form-check-label" for="carga11" style="padding-left: 0px;">
                    Desechos
                  </label>
                </div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="otros" id="carga12">
                  <label class="form-check-label" for="carga12" style="padding-left: 0px;">
                    Otros
                  </label>
                </div>
              </div>
            </div>
          </div>
          <hr style="margin-top: 5px; margin-bottom: 10px;">
          <h5>Descripción de la carga</h5>
          <div class="row">
            <div class="col-md-12 form-group">
              <label>* Motivo de retiro, ingreso o traslado</label>
              <input type="text" class="form-control" name="motivo" required="true" autocomplete="off">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label>* Detalle</label>
              <textarea class="form-control" name="detalle" required="true"></textarea>
            </div>
          </div>
          <hr style="margin-top: 5px; margin-bottom: 10px;">
          <h5>Datos del proveedor y/o contratista</h5>
          <div class="row">
            <div class="col-md-8 form-group">
              <label>* Nombre Empresa</label>
              <input type="text" name="empresa_proveedor" class="form-control" required="true" autocomplete="off">
            </div>
          </div>
          <h5>Datos Vehículo</h5>
          <div class="row">
            <div class="col-md-4 form-group">
              <label>* Marca</label>
              <input type="text" name="marca1" class="form-control" required="true" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>* Color</label>
              <input type="text" name="color1" class="form-control" required="true" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>* Placa</label>
              <input type="text" name="placa1" class="form-control" required="true" autocomplete="off">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group">
              <label>Marca</label>
              <input type="text" name="marca2" class="form-control" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>Color</label>
              <input type="text" name="color2" class="form-control" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>Placa</label>
              <input type="text" name="placa2" class="form-control" autocomplete="off">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group">
              <label>Marca</label>
              <input type="text" name="marca3" class="form-control" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>Color</label>
              <input type="text" name="color3" class="form-control" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>Placa</label>
              <input type="text" name="placa3" class="form-control" autocomplete="off">
            </div>
          </div>
          <hr>
          <h5>Listado de Personal</h5>
          <div class="wrapper-listado">
            <div class="row">
              <div class="col-md-9 form-group">
                <label>* Nombre</label>
                <input name="personal_name[]" class="form-control" required="true" autocomplete="off">
              </div>
              <div class="col-md-2 form-group">
                <label>* DPI</label>
                <input name="personal_dpi[]" class="form-control" required="true" autocomplete="off">
              </div>
              <div class="col-md-1 form-group">
                <a href="javascript:void(0);" class="btn btn-success add_more_listado" style="margin-top:30px;"><i class="fa fa-plus-circle"></i></a>
              </div>
            </div>
          </div>
          <hr style="margin-top: 5px; margin-bottom: 10px;">
          <h5>Datos de la persona que autoriza</h5>
          <div class="row">
            <div class="col-md-4 form-group">
              <label>* Nombre</label>
              <input name="autorizanombre" class="form-control" required="true" autocomplete="off">
            </div>
            <div class="col-md-3 form-group">
              <label>* Cargo</label>
              <input name="autorizacargo" class="form-control" required="true" autocomplete="off">
            </div>
            <div class="col-md-2 form-group">
              <label>* Teléfono</label>
              <input name="autorizatelefono" class="form-control" required="true" autocomplete="off">
            </div>
            <div class="col-md-3 form-group">
              <label>* Email</label>
              <input name="autorizaemail" type="email" class="form-control" required="true" autocomplete="off">
            </div>
          </div>
          <div class="form-layout-footer">
            <button type="submit" style="cursor: pointer;" name="enviarPequena" class="btn btn-info mg-r-5">Enviar solicitud</button>
            <a href="#" style="cursor: pointer;" class="btn btn-default mg-r-5 cancelarElevador">Cancelar</a>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
      </form>
      <form class="grandeForm formE" method="POST" action="<?= base_url('elevadores') ?>" style="display: none;">
        <div class="form">
          <input type="hidden" name="empresaid" value="<?= $_SESSION['idoficina'] ?>">
          <?php
          $oficina = $this->intranet_model->get_oficina_single($_SESSION['idoficina']);
          ?>
          <h2 class="text-success">Carga grande</h2>
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
            <div class="col-md-3 form-group">
              <label>* Propietario – Inquilino</label>
              <select name="tipo" class="form-control">
                <option value="0">Selecciona una opción</option>
                <option value="propietario">Propietario</option>
                <option value="inquilino">Inquilino</option>
              </select>
            </div>
            <div class="col-md-3 form-group">
              <label>* Fecha que requiere elevador</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input type="date" name="fecha" class="form-control" placeholder="MM/DD/YYYY" required="true" autocomplete="off">
              </div>
            </div>
            <div class="col-md-3 form-group">
              <label>* Horario Solicitado</label>
              <select name="horario" class="form-control">
                <option value="0">Selecciona una opción</option>
                <option value="Lunes a viernes a partir de las 19:00 horas">Lunes a viernes a partir de las 19:00 horas</option>
                <option value="Sábado a partir de 14:00 horas">Sábado a partir de 14:00 horas</option>
                <option value="Domingo a cualquier hora">Domingo a cualquier hora</option>
              </select>
            </div>
            <div class="col-md-3 form-group">
              <label>* Tipo Requerimiento</label>
              <select name="requerimiento" class="form-control">
                <option value="0">Selecciona una opción</option>
                <option value="req1">Ingreso</option>
                <option value="req2">Retiro</option>
                <option value="req3">Traslado dentro de Zona Pradera</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label>* Tipo de Carga</label>
              <div class="row">
                <div class="col-md-1"></div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="mobiliario" id="carga13">
                  <label class="form-check-label" for="carga13" style="padding-left: 0px;">
                    Mobiliario
                  </label>
                </div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="equipo" id="carga14">
                  <label class="form-check-label" for="carga14" style="padding-left: 0px;">
                    Equipo
                  </label>
                </div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="productos" id="carga15">
                  <label class="form-check-label" for="carga15" style="padding-left: 0px;">
                    Productos
                  </label>
                </div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="material" id="carga16">
                  <label class="form-check-label" for="carga16" style="padding-left: 0px;">
                    Material
                  </label>
                </div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="desechos" id="carga17">
                  <label class="form-check-label" for="carga17" style="padding-left: 0px;">
                    Desechos
                  </label>
                </div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="otros" id="carga18">
                  <label class="form-check-label" for="carga18" style="padding-left: 0px;">
                    Otros
                  </label>
                </div>
              </div>
            </div>
          </div>
          <hr style="margin-top: 5px; margin-bottom: 10px;">
          <div class="row">
            <div class="col-md-12 form-group">
              <label>* Motivo de retiro, ingreso o traslado</label>
              <input type="text" class="form-control" name="motivo" required="true" autocomplete="off">
            </div>
          </div>
          <h5>Descripción de la carga</h5>
          <p>Especifique si hay un equipo y/o mobiliario que sobrepase peso máximo o dimensiones de elevador de carga. Consulte las medidas y dimensiones del elevador de carga en la sección de Documentos PDF (Información Importante).</p>
          <div class="row">
            <div class="col-md-9 form-group">
              <label>* Detalle</label>
              <textarea class="form-control" name="detalle" required="true"></textarea>
            </div>
            <div class="col-md-3 form-group">
              <label>* Archivo de detalle</label>
              <input type="file" name="archivo" class="form-control" required="true" autocomplete="off">
            </div>
          </div>
          <hr style="margin-top: 5px; margin-bottom: 10px;">
          <h5>Datos del proveedor y/o contratista</h5>
          <div class="row">
            <div class="col-md-8 form-group">
              <label>* Nombre Empresa</label>
              <input type="text" name="empresa_proveedor" class="form-control" required="true" autocomplete="off">
            </div>
          </div>
          <h5>Datos Vehículo</h5>
          <div class="row">
            <div class="col-md-4 form-group">
              <label>* Marca</label>
              <input type="text" name="marca1" class="form-control" required="true" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>* Color</label>
              <input type="text" name="color1" class="form-control" required="true" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>* Placa</label>
              <input type="text" name="placa1" class="form-control" required="true" autocomplete="off">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group">
              <label>Marca</label>
              <input type="text" name="marca2" class="form-control" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>Color</label>
              <input type="text" name="color2" class="form-control" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>Placa</label>
              <input type="text" name="placa2" class="form-control" autocomplete="off">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group">
              <label>Marca</label>
              <input type="text" name="marca3" class="form-control" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>Color</label>
              <input type="text" name="color3" class="form-control" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>Placa</label>
              <input type="text" name="placa3" class="form-control" autocomplete="off">
            </div>
          </div>
          <hr>
          <h5>Listado de Personal</h5>
          <div class="wrapper-listado">
            <div class="row">
              <div class="col-md-9 form-group">
                <label>* Nombre</label>
                <input name="personal_name[]" class="form-control" required="true" autocomplete="off">
              </div>
              <div class="col-md-2 form-group">
                <label>* DPI</label>
                <input name="personal_dpi[]" class="form-control" required="true" autocomplete="off">
              </div>
              <div class="col-md-1 form-group">
                <a href="javascript:void(0);" class="btn btn-success add_more_listado" style="margin-top:30px;"><i class="fa fa-plus-circle"></i></a>
              </div>
            </div>
          </div>
          <hr style="margin-top: 5px; margin-bottom: 10px;">
          <h5>Datos de la persona que autoriza</h5>
          <div class="row">
            <div class="col-md-4 form-group">
              <label>* Nombre</label>
              <input name="autorizanombre" class="form-control" required="true" autocomplete="off">
            </div>
            <div class="col-md-3 form-group">
              <label>* Cargo</label>
              <input name="autorizacargo" class="form-control" required="true" autocomplete="off">
            </div>
            <div class="col-md-2 form-group">
              <label>* Teléfono</label>
              <input name="autorizatelefono" class="form-control" required="true" autocomplete="off">
            </div>
            <div class="col-md-3 form-group">
              <label>* Email</label>
              <input name="autorizaemail" type="email" class="form-control" required="true" autocomplete="off">
            </div>
          </div>
          <div class="form-layout-footer">
            <button type="submit" style="cursor: pointer;" name="enviarGrande" class="btn btn-info mg-r-5">Enviar solicitud</button>
            <a href="#" style="cursor: pointer;" class="btn btn-default mg-r-5 cancelarElevador">Cancelar</a>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
      </form>
      <form class="mudanzaForm formE" method="POST" action="<?= base_url('elevadores') ?>" style="display: none;">
        <div class="form">
          <input type="hidden" name="empresaid" value="<?= $_SESSION['idoficina'] ?>">
          <?php
          $oficina = $this->intranet_model->get_oficina_single($_SESSION['idoficina']);
          ?>
          <h2 class="text-success">Mudanza</h2>
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
            <div class="col-md-3 form-group">
              <label>* Propietario – Inquilino</label>
              <select name="tipo" class="form-control">
                <option value="0">Selecciona una opción</option>
                <option value="propietario">Propietario</option>
                <option value="inquilino">Inquilino</option>
              </select>
            </div>
            <div class="col-md-3 form-group">
              <label>* Fecha que requiere elevador</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input type="date" name="fecha" class="form-control" placeholder="MM/DD/YYYY" required="true" autocomplete="off">
              </div>
            </div>
            <div class="col-md-3 form-group">
              <label>* Horario Solicitado</label>
              <select name="horario" class="form-control">
                <option value="0">Selecciona una opción</option>
                <option value="Lunes a viernes a partir de las 19:00 horas">Lunes a viernes a partir de las 19:00 horas</option>
                <option value="Sábado a partir de 14:00 horas">Sábado a partir de 14:00 horas</option>
                <option value="Domingo a cualquier hora">Domingo a cualquier hora</option>
              </select>
            </div>
            <div class="col-md-3 form-group">
              <label>* Tipo Requerimiento</label>
              <select name="requerimiento" class="form-control">
                <option value="0">Selecciona una opción</option>
                <option value="Ingreso">Ingreso</option>
                <option value="Retiro">Retiro</option>
                <option value="Traslado dentro de Zona Pradera">Traslado dentro de Zona Pradera</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label>* Tipo de Carga</label>
              <div class="row">
                <div class="col-md-1"></div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="mobiliario" id="carga19">
                  <label class="form-check-label" for="carga19" style="padding-left: 0px;">
                    Mobiliario
                  </label>
                </div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="equipo" id="carga20">
                  <label class="form-check-label" for="carga20" style="padding-left: 0px;">
                    Equipo
                  </label>
                </div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="productos" id="carga21">
                  <label class="form-check-label" for="carga21" style="padding-left: 0px;">
                    Productos
                  </label>
                </div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="material" id="carga22">
                  <label class="form-check-label" for="carga22" style="padding-left: 0px;">
                    Material
                  </label>
                </div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="desechos" id="carga23">
                  <label class="form-check-label" for="carga23" style="padding-left: 0px;">
                    Desechos
                  </label>
                </div>
                <div class="form-check col-md-1">
                  <input class="form-check-input" type="checkbox" name="carga[]" value="otros" id="carga24">
                  <label class="form-check-label" for="carga24" style="padding-left: 0px;">
                    Otros
                  </label>
                </div>
              </div>
            </div>
          </div>
          <hr style="margin-top: 5px; margin-bottom: 10px;">
          <h5>Descripción de la carga</h5>
          <div class="row">
            <div class="col-md-12 form-group">
              <p>Especifique si hay un equipo y/o mobiliario que sobrepase peso máximo o dimensiones de elevador de carga. Consulte las medidas y dimensiones del elevador de carga en la sección de Documentos PDF (Información Importante).</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9 form-group">
              <label>* Detalle la cantidad de mobiliario, equipo y/o productos</label>
              <textarea class="form-control" name="detalle" required="true"></textarea>
            </div>
            <div class="col-md-3 form-group">
              <label>* Archivo de detalle</label>
              <input type="file" name="archivo" class="form-control" required="true" autocomplete="off">
            </div>
          </div>
          <hr style="margin-top: 5px; margin-bottom: 10px;">
          <h5>Datos del proveedor y/o contratista</h5>
          <div class="row">
            <div class="col-md-8 form-group">
              <label>* Nombre Empresa</label>
              <input type="text" name="empresa_proveedor" class="form-control" required="true" autocomplete="off">
            </div>
          </div>
          <h5>Datos Vehículo</h5>
          <div class="row">
            <div class="col-md-4 form-group">
              <label>* Marca</label>
              <input type="text" name="marca1" class="form-control" required="true" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>* Color</label>
              <input type="text" name="color1" class="form-control" required="true" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>* Placa</label>
              <input type="text" name="placa1" class="form-control" required="true" autocomplete="off">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group">
              <label>Marca</label>
              <input type="text" name="marca2" class="form-control" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>Color</label>
              <input type="text" name="color2" class="form-control" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>Placa</label>
              <input type="text" name="placa2" class="form-control" autocomplete="off">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group">
              <label>Marca</label>
              <input type="text" name="marca3" class="form-control" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>Color</label>
              <input type="text" name="color3" class="form-control" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
              <label>Placa</label>
              <input type="text" name="placa3" class="form-control" autocomplete="off">
            </div>
          </div>
          <hr>
          <h5>Listado de Personal</h5>
          <div class="wrapper-listado">
            <div class="row">
              <div class="col-md-9 form-group">
                <label>* Nombre</label>
                <input name="personal_name[]" class="form-control" required="true" autocomplete="off">
              </div>
              <div class="col-md-2 form-group">
                <label>* DPI</label>
                <input name="personal_dpi[]" class="form-control" required="true" autocomplete="off">
              </div>
              <div class="col-md-1 form-group">
                <a href="javascript:void(0);" class="btn btn-success add_more_listado" style="margin-top:30px;"><i class="fa fa-plus-circle"></i></a>
              </div>
            </div>
          </div>
          <hr style="margin-top: 5px; margin-bottom: 10px;">
          <h5>Datos de la persona que autoriza</h5>
          <div class="row">
            <div class="col-md-4 form-group">
              <label>* Nombre</label>
              <input name="autorizanombre" class="form-control" required="true" autocomplete="off">
            </div>
            <div class="col-md-3 form-group">
              <label>* Cargo</label>
              <input name="autorizacargo" class="form-control" required="true" autocomplete="off">
            </div>
            <div class="col-md-2 form-group">
              <label>* Teléfono</label>
              <input name="autorizatelefono" class="form-control" required="true" autocomplete="off">
            </div>
            <div class="col-md-3 form-group">
              <label>* Email</label>
              <input name="autorizaemail" type="email" class="form-control" required="true" autocomplete="off">
            </div>
          </div>
          <div class="form-layout-footer">
            <button type="submit" style="cursor: pointer;" name="enviarMudanza" class="btn btn-info mg-r-5">Enviar solicitud</button>
            <a href="#" style="cursor: pointer;" class="btn btn-default mg-r-5 cancelarElevador">Cancelar</a>
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
              <th>Tipo de uso</th>
              <th style="width: 130px;">Fecha solicitud</th>
              <th style="width: 80px;">Horario</th>
              <th style="width: 80px;">Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($solicitudes as $s) {
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
              } elseif ($s['status_elevador'] == 3) {
                $estado = "COMPLETADO";
                $estadocolor = "#00a6f5";
              }

							$tipoForm = '';

							if($titulo == 'Trabajos Internos'){
								$tipoForm = 1;
							}

							if($titulo == 'Carga Pequeña'){
								$tipoForm = 2;
							}

							if($titulo == 'Carga Grande'){
								$tipoForm = 3;
							}

							if($titulo == 'Mudanza'){
								$tipoForm = 4;
							}
            ?>
              <tr>
								<td style="text-align: center;"><?= $s['id'] ?></td>
                <td style="width:30px; text-align: center;">
									<a target="_blank" href="<?= base_url('solicitudes/solicitud_elevador/' . $s['id']) ?>" class="btn btn-sm btn-default"><i class="fa fa-link"></i></a>
									<?php
									if($estado == "PENDIENTE") {
									?>
									<a href="<?= base_url('elevadores/editar_elevador/' . $s['id'] . '/' . $tipoForm) ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
									<?php
									}
									?>
								</td>
                <td style="padding-top: 15px;"><?= $titulo ?></td>
                <td style="text-align: center; padding-top: 15px;"><?= $fecha_solicitud ?></td>
                <td style="text-align: center; padding-top: 15px;"><?= $s['horario'] ?></td>
                <td style="text-align: center; background-color: <?= @$estadocolor ?>; color: #fff; padding-top: 15px;"><?= $estado ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->
  </div><!-- col-6 -->
</div>
