<style>
  label {
    font-weight: bold;
  }
</style>
<div class="row row-sm mg-t-20">
  <div class="col-xl-12">
    <div class="card pd-20 pd-sm-40">
      		<form method="POST" id="solremode" action="<?= base_url('remodelaciones/editar_remodelaciones/' . $idsol) ?>" enctype="multipart/form-data">
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
										<input class="form-control" type="text" name="titulo" value="" placeholder="Ingresar título de solicitud" autocomplete="off">
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
												<option value="<?= $t['id_torres'] ?>" <?= ($t['id_torres'] == $remodelaciones_info[0]['torre_id'])?'selected = "selected"':'' ?>><?= $t['torre'] ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="form-group">
										<label class="form-control-label">Oficina: <span class="tx-danger">*</span></label>
										<input class="form-control" type="text" name="oficina" value="<?= $remodelaciones_info[0]['oficina'] ?>" placeholder="Ingresar no. oficina" autocomplete="off">
									</div>
								</div><!-- col-4 -->
								<div class="col-lg-3">
									<div class="form-group">
										<label class="form-control-label">Fecha Inicio: <span class="tx-danger">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
											<input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" value="<?= $remodelaciones_info[0]['fechainicio'] ?>" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
										<label class="form-control-label">Fecha Fin: <span class="tx-danger">*</span></label>
										<div class="input-group">
											<span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
											<input type="date" id="fecha_fin" name="fecha_fin" class="form-control" value="<?= $remodelaciones_info[0]['fechafin'] ?>" autocomplete="off">
										</div>
									</div>
								</div>
								<input type="hidden" name="empresaid" value="<?= $_SESSION['idoficina'] ?>">

							</div><!-- row -->
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="form-control-label">Descripción: <span class="tx-danger">*</span></label>
										<textarea class="form-control" name="descripcion" autocomplete="off"><?= $remodelaciones_info[0]['descripcion'] ?></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-9">
									<table class="table table-condensed">
										<tbody>
											<tr>
												<td style="width: 30px; text-align: center;"><a href="<?= base_url('remodelaciones-docs/' . $remodelaciones_info[0]['file1']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
												<td>Carta formal. Archivo PDF. (Máximo 24MB) <span class="tx-danger">*</span></td>
												<td><input onchange="ValidateSize(this, 24)" type="FILE" name="file1" class="form-control"></td>
											</tr>
											<tr>
												<td style="width: 30px; text-align: center;"><a href="<?= base_url('remodelaciones-docs/' . $remodelaciones_info[0]['file2']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
												<td>Plano actual. Archivo PDF. (Máximo 24MB) <span class="tx-danger">*</span></td>
												<td><input onchange="ValidateSize(this, 24)" type="FILE" name="file2" class="form-control"></td>
											</tr>
											<tr>
												<td style="width: 30px; text-align: center;"><a href="<?= base_url('remodelaciones-docs/' . $remodelaciones_info[0]['file3']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
												<td>Plano propuesta de remodelación. Archivo PDF. (Máximo 24MB) <span class="tx-danger">*</span></td>
												<td><input onchange="ValidateSize(this, 24)" type="FILE" name="file3" class="form-control"></td>
											</tr>
											<tr>
												<td style="width: 30px; text-align: center;"><a href="<?= base_url('remodelaciones-docs/' . $remodelaciones_info[0]['file4']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
												<td>Cronograma de actividades. Archivo PDF. (Máximo 24MB) <span class="tx-danger">*</span></td>
												<td><input onchange="ValidateSize(this, 24)" type="FILE" name="file4" class="form-control"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="form-layout-footer">
								<button type="submit" style="cursor: pointer;" name="editar" class="btn btn-info mg-r-5">Editar solicitud</button>
								<a href="<?= base_url('remodelaciones') ?>" style="cursor: pointer;" class="btn btn-default mg-r-5 cancelarMudanza">Cancelar</a>
							</div><!-- form-layout-footer -->
						</div><!-- form-layout -->
					</form>	
    </div>
  </div><!-- col-6 -->
</div><!-- row -->
