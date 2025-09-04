<div class="row row-sm mg-t-20">

	<div class="col-xl-12">
		<?php
		if($msg == 'success'){
		?>
		<div class="alert alert-warning" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<div class="d-flex align-items-center justify-content-start">
				<i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
				<span>La solicitud ha sido editada exitosamente.</span>
			</div><!-- d-flex -->
		</div><!-- alert -->
		<?php
		}
		?>
		<?php
		if($msg == 'aprobado'){
		?>
		<div class="alert alert-warning" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<div class="d-flex align-items-center justify-content-start">
				<i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
				<span>La solicitud ha sido aprobada exitosamente.</span>
			</div><!-- d-flex -->
		</div><!-- alert -->
		<?php
		}
		?>
		<?php
		if($msg == 'desactivar'){
		?>
		<div class="alert alert-warning" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<div class="d-flex align-items-center justify-content-start">
				<i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
				<span>La solicitud ha sido desactivada exitosamente.</span>
			</div><!-- d-flex -->
		</div><!-- alert -->
		<?php
		}
		?>
    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Editar solicitud de empleo</h6>
        <form method="POST" action="<?= base_url('empleos/editar_empleo/' . $empleo['id_plaza']) ?>">
				<input type="hidden" name="idempleo" value="<?= $empleo['id_plaza'] ?>">
        <div class="form-layout">
					<div class="row">
						<div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Oficina:</label>
								<input type="text" class="form-control" disabled="disabled" value="<?= $empleo['nombre_oficina'] ?>">
								<input type="hidden" name="empresaid" value="<?= $empleo['id_plaza'] ?>">
							</div>
						</div>
					</div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Título de oferta: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="titulo" value="<?= $empleo['titulo'] ?>" placeholder="Ingresar título de oferta">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-2">
              <div class="form-group">
                <label class="form-control-label">Duración: <span class="tx-danger">*</span></label>
								<select class="form-control select2" name="duracion" data-placeholder="Selecciona">
                  <option label="Selecciona"></option>
                  <option value="30" <?= ($empleo['dias_publicacion'] == 30)?'selected="selected"':'' ?>>30 dias</option>
									<option value="60" <?= ($empleo['dias_publicacion'] == 60)?'selected="selected"':'' ?>>60 dias</option>
                </select>
              </div>
            </div><!-- col-4 -->
						<div class="col-lg-2">
              <div class="form-group">
                <label class="form-control-label">Salario: <span class="tx-danger">*</span></label>
								<select class="form-control select2" name="moneda" data-placeholder="Selecciona">
                  <option label="Selecciona"></option>
                  <option value="Q" <?= ($empleo['moneda'] == 'Q')?'selected="selected"':'' ?>>Quetzales</option>
									<option value="$" <?= ($empleo['moneda'] == '$')?'selected="selected"':'' ?>>Dolares</option>
									<option value="AC" <?= ($empleo['moneda'] == 'AC')?'selected="selected"':'' ?>>A convenir</option>
                </select>
              </div>
            </div><!-- col-4 -->
						<div class="col-lg-2">
              <div class="form-group">
                <label class="form-control-label">Monto: <span class="tx-danger">*</span></label>
                <input style="text-align: right;" class="form-control" type="text" name="cantidad" value="<?= $empleo['salario'] ?>" placeholder="Ingresar monto">
              </div>
            </div><!-- col-4 -->
          </div><!-- row -->
					<div class="row">
						<div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">Descripción: <span class="tx-danger">*</span></label>
								<textarea class="form-control" name="descripcion"><?= $empleo['descripcion'] ?></textarea>
              </div>
            </div><!-- col-4 -->
						<div class="col-lg-2">
              <div class="form-group">
                <label class="form-control-label">Tipo contrato: <span class="tx-danger">*</span></label>
								<select class="form-control select2" name="tipo_contrato" data-placeholder="Selecciona">
                  <option label="Selecciona"></option>
                  <option value="1" <?= ($empleo['tipo_contratacion'] == 1)?'selected="selected"':'' ?>>Temporal</option>
									<option value="2" <?= ($empleo['tipo_contratacion'] == 2)?'selected="selected"':'' ?>>Plaza fija</option>
									<option value="3" <?= ($empleo['tipo_contratacion'] == 3)?'selected="selected"':'' ?>>Medio tiempo</option>
									<option value="4" <?= ($empleo['tipo_contratacion'] == 4)?'selected="selected"':'' ?>>Prácticas</option>
									<option value="5" <?= ($empleo['tipo_contratacion'] == 5)?'selected="selected"':'' ?>>Freelance</option>
                </select>
              </div>
            </div><!-- col-4 -->
						<div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Nivel académico: <span class="tx-danger">*</span></label>
								<select class="form-control select2" name="estudios" data-placeholder="Selecciona">
                  <option label="Selecciona"></option>
                  <option value="1" <?= ($empleo['nivel_academico'] == 1)?'selected="selected"':'' ?>>Diversificado</option>
									<option value="2" <?= ($empleo['nivel_academico'] == 2)?'selected="selected"':'' ?>>Estudiante universitario</option>
									<option value="3" <?= ($empleo['nivel_academico'] == 3)?'selected="selected"':'' ?>>Universidad completa</option>
									<option value="4" <?= ($empleo['nivel_academico'] == 4)?'selected="selected"':'' ?>>Maestría</option>
                </select>
              </div>
            </div><!-- col-4 -->
						<div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Categoría: <span class="tx-danger">*</span></label>
								<select class="form-control select2" name="categoria" data-placeholder="Selecciona">
                  <option label="Selecciona"></option>
                  <?php
										foreach($cat_empleos as $ce){
									?>
									<option value="<?= $ce['id_ce'] ?>" <?= ($empleo['idcategoria'] == $ce['id_ce'])?'selected="selected"':'' ?>><?= $ce['nombre_ce'] ?></option>
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
                  <option value="1" <?= ($empleo['experiencia_laboral'] == 1)?'selected="selected"':'' ?>>No requerida</option>
									<option value="2" <?= ($empleo['experiencia_laboral'] == 2)?'selected="selected"':'' ?>>1 año</option>
									<option value="3" <?= ($empleo['experiencia_laboral'] == 3)?'selected="selected"':'' ?>>2 años</option>
									<option value="4" <?= ($empleo['experiencia_laboral'] == 4)?'selected="selected"':'' ?>>3 años o mas</option>
                </select>
              </div>
            </div><!-- col-4 -->
					</div>
					<div class="row">
						<div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                <input class="form-control" type="email" name="email_empresa" value="<?= $empleo['email_envio'] ?>" placeholder="Ingresar email">
              </div>
            </div><!-- col-4 -->
						<div class="col-lg-4">
              <div class="form-group">
								<label class="ckbox" style="margin-top: 30px;">
									<input type="checkbox" name="privada" value="PR" <?= ($empleo['oferta'] == 'PR')?'checked="checked"':'' ?>>
									<span>Oferta confidencial</span>
								</label>
							</div>
						</div>
					</div>

          <div class="form-layout-footer">
						<a href="<?= base_url('empleos') ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i></a>
            <button type="submit" name="editar" style="cursor: pointer;" class="btn btn-success mg-r-5">Editar solicitud</button>
						<?php
						if($empleo['status_plaza'] == 1){
						?>
						<button type="submit" name="aprobar" style="cursor: pointer;" class="btn btn-info">APROBAR SOLICITUD</button>
						<button type="submit" name="rechazar" style="cursor: pointer;" class="btn btn-danger">RECHAZAR SOLICITUD</button>
						<?php
						}
						?>
						<?php
						if($empleo['status_plaza'] == 0){
						?>
						<button type="submit" name="aprobar" style="cursor: pointer;" class="btn btn-info">ACTIVAR SOLICITUD</button>
						<?php
						}
						?>
						<?php
						if($empleo['status_plaza'] == 2){
						?>
						<button type="submit" name="desactivar" style="cursor: pointer;" class="btn btn-warning">DESACTIVAR SOLICITUD</button>
						<?php
						}
						?>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
        </form>
    </div>
	</div><!-- col-6 -->
</div><!-- row -->