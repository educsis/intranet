<div class="row row-sm mg-t-20">
  <div class="col-xl-12">
    <?php
    if ($msg == 'success') {
    ?>
      <div class="alert alert-warning" role="alert">
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
      <h6 class="card-body-title">Solicitud de empleo</h6>
      <p>Sección exclusiva para Condóminos de Zona Pradera para publicar y promover plazas disponibles dentro de su empresa sin ningún costo. Recibirá correo de confirmación de publicación de 24 a 48 horas.</p>
      <form method="POST" action="<?= base_url('empleos') ?>">
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
        <div class="form-layout">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Título de oferta: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="titulo" value="" placeholder="Ingresar título de oferta" required="true" autocomplete="off">
              </div>
            </div><!-- col-4 -->
            <input type="hidden" name="empresaid" value="<?= $_SESSION['idoficina'] ?>">
            <div class="col-lg-2">
              <div class="form-group">
                <label class="form-control-label">Duración: <span class="tx-danger">*</span></label>
                <select class="form-control select2" name="duracion" data-placeholder="Selecciona">
                  <option label="Selecciona"></option>
                  <option value="30">30 dias</option>
                  <option value="60">60 dias</option>
                </select>
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-2">
              <div class="form-group">
                <label class="form-control-label">Salario: <span class="tx-danger">*</span></label>
                <select class="form-control select2" name="moneda" data-placeholder="Selecciona">
                  <option label="Selecciona"></option>
                  <option value="Q">Quetzales</option>
                  <option value="$">Dolares</option>
                  <option value="AC">A convenir</option>
                </select>
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-2">
              <div class="form-group">
                <label class="form-control-label">Monto: <span class="tx-danger">*</span></label>
                <input style="text-align: right;" class="form-control" type="text" name="cantidad" value="0.00" placeholder="Ingresar monto" required="true" autocomplete="off">
              </div>
            </div><!-- col-4 -->
          </div><!-- row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">Descripción: <span class="tx-danger">*</span></label>
                <textarea class="form-control" name="descripcion" required="true" autocomplete="off"></textarea>
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-2">
              <div class="form-group">
                <label class="form-control-label">Tipo contrato: <span class="tx-danger">*</span></label>
                <select class="form-control select2" name="tipo_contrato" data-placeholder="Selecciona">
                  <option label="Selecciona"></option>
                  <option value="1">Temporal</option>
                  <option value="2">Plaza fija</option>
                  <option value="3">Medio tiempo</option>
                  <option value="4">Prácticas</option>
                  <option value="5">Freelance</option>
                </select>
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Nivel académico: <span class="tx-danger">*</span></label>
                <select class="form-control select2" name="estudios" data-placeholder="Selecciona">
                  <option label="Selecciona"></option>
                  <option value="1">Diversificado</option>
                  <option value="2">Estudiante universitario</option>
                  <option value="3">Universidad completa</option>
                  <option value="4">Maestría</option>
                </select>
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Categoría: <span class="tx-danger">*</span></label>
                <select class="form-control select2" name="categoria" data-placeholder="Selecciona">
                  <option label="Selecciona"></option>
                  <?php
                  foreach ($cat_empleos as $ce) {
                  ?>
                    <option value="<?= $ce['id_ce'] ?>"><?= $ce['nombre_ce'] ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Experiencia laboral: <span class="tx-danger">*</span></label>
                <select class="form-control select2" name="experiencia" data-placeholder="Selecciona">
                  <option label="Selecciona"></option>
                  <option value="2">1 año</option>
                  <option value="3">2 años</option>
                  <option value="4">3 años o mas</option>
                </select>
              </div>
            </div><!-- col-4 -->
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                <input class="form-control" type="email" name="email_empresa" value="" placeholder="Ingresar email" required="true" autocomplete="off">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="ckbox" style="margin-top: 30px;">
                  <input type="checkbox" name="privada" value="PR">
                  <span>Oferta confidencial</span>
                </label>
              </div>
            </div>
          </div>

          <div class="form-layout-footer">
            <button type="submit" style="cursor: pointer;" name="enviar" class="btn btn-info mg-r-5">Enviar solicitud</button>
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
              <th style="width: 80px;">Fecha solicitud</th>
              <th style="width: 80px;">Fecha aprobación</th>
              <th style="width: 80px;">Fecha finaliza</th>
              <th>Título</th>
              <th>Categoría</th>
              <th style="width: 50px;">No. aplicaciones</th>
              <th style="width: 80px;">Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($empleos as $e) {
              $fecha_solicitud = date('d-m-Y', strtotime($e['fecha_solicitud']));

              if ($e['fecha_publicacion']) {
                $fecha_aprobacion = date('d-m-Y', strtotime($e['fecha_publicacion']));
                $dias = $e['dias_publicacion'];
                $fecha_termina = date('d-m-Y', strtotime($e['fecha_publicacion'] . " + $dias days"));
              } else {
                $fecha_aprobacion = "PENDIENTE";
                $fecha_termina = "PENDIENTE";
              }

              $titulo = $e['titulo'];
              $categoria = $e['categoria'];
              $conteo_aplicaciones = $e['conteo'];

              // 0=desactivada, 1=pendiente aprovacion, 2=activa, 3=pausa
              if ($e['status_plaza'] == 0) {
                $estado = "INACTIVA";
                $estadocolor = "#bbbcbc";
              } elseif ($e['status_plaza'] == 1) {
                $estado = "PENDIENTE";
                $estadocolor = "#fd5f52";
              } elseif ($e['status_plaza'] == 2) {
                $estado = "ACTIVA";
                $estadocolor = "#0f4493";
              } elseif ($e['status_plaza'] == 3) {
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
                <td style="text-align: center;"><?= $conteo_aplicaciones ?></td>
                <td style="text-align: center; background-color: <?= $estadocolor ?>; color: #fff;"><?= $estado ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->
  </div><!-- col-6 -->
</div>
