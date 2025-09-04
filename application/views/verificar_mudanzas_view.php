<div class="row row-sm mg-t-20">
	<div class="col-xl-12 mg-t-25 mg-xl-t-0">
		<div class="card pd-10 pd-sm-10 form-layout form-layout-5">
			<div class="table-wrapper">
				<?php
				$oficina = $this->intranet_model->get_oficina_single($mudanzas_info[0]['id_oficina']);
				?>
				<h3 style="float: left;"><?= $mudanzas_info[0]['tipo']  . ' - ID Solicitud: ' . $mudanzas_info[0]['id'] ?></h3>
				<?php
					if ($mudanzas_info[0]['status_mudanza'] == 0) {
						$estado = "PENDIENTE";
						$estadocolor = "#ffc14d";
					} elseif ($mudanzas_info[0]['status_mudanza'] == 1) {
						$estado = "APROBADO";
						$estadocolor = "#00b300";
					} elseif ($mudanzas_info[0]['status_mudanza'] == 2) {
						$estado = "DENEGADO";
						$estadocolor = "#ff0000";
					} elseif ($mudanzas_info[0]['status_mudanza'] == 3) {
						$estado = "COMPLETADO";
						$estadocolor = "#00a6f5";
					}
				?>
				<p style="font-weight: bold; padding: 4px 8px; border-radius: 6px; float: right; color: #fff; background-color: <?= $estadocolor; ?>"><?= $estado; ?></p>
				<table class="table table-default table-responsive table-bordered">
					<tbody>
						<tr>
							<td style="font-weight: bold; background-color: #999a9b; color: #fff;">Empresa</td>
							<td><?= $oficina[0]['nombre_oficina'] ?></td>
							<td style="font-weight: bold; background-color: #999a9b; color: #fff;">Torre</td>
							<td><?= $oficina[0]['torre'] ?></td>
							<td style="font-weight: bold; background-color: #999a9b; color: #fff;">Oficina</td>
							<td><?= $oficina[0]['numero_oficina'] ?></td>
						</tr>
					</tbody>
				</table>
				<?php
				if($mudanzas_info[0]['tipo'] == "INGRESO DE INQUILINO/PROPIETARIO SOCIEDAD ANONIMA") {
					$files = $this->intranet_model->get_solicitudes_mudanzas_files($mudanzas_info[0]['id']);
				?>
				<table class="table table-condensed">
					<tbody>
						<tr>
							<td>Carta del propietario autorizando el ingreso de inquilino, el documento debe indicar si hay cambios en la facturación.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file1']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Ficha de datos generales de la empresa.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file2']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Formato de Nuevo Inquilino (FNI) firmado por la empresa arrendataria.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file3']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Copia de nombramientos vigentes de la sociedad arrendataria o nueva adquiriente.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file4']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Copia de RTU.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file5']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Copia de patente de comercio.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file6']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Copia de la escritura de arrendamiento.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file7']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Logo de la empresa en formato .jpg</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file8']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Copia de póliza de Responsabilidad Civil.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file9']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Completar formulario de Censo.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file10']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
					</tbody>
              	</table>
				<?php
				}
				?>
				<?php
				if($mudanzas_info[0]['tipo'] == "CAMBIO DE PROPIETARIO – SOCIEDAD ANONIMA") {
					$files = $this->intranet_model->get_solicitudes_mudanzas_files($mudanzas_info[0]['id']);
				?>
				<table class="table table-condensed">
					<tbody>
						<tr>
							<td>Carta del propietario autorizando el ingreso de inquilino, el documento debe indicar si hay cambios en la facturación.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file1']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Ficha de datos generales del nuevo propietario.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file2']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Formato de Nuevo Propietario (FNP) firmado por el representante legal.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file3']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Copia de la escritura de compraventa.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file4']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Copia de los nombramientos vigentes de la sociedad arrendataria o nueva adquiriente.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file5']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Copia DPI representante legal.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file6']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Copia de patente de comercio.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file7']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Copia de RTU.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file8']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Copia de póliza de Responsabilidad Civil.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file9']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
					</tbody>
              	</table>
				<?php
				}
				?>
				<?php
				if($mudanzas_info[0]['tipo'] == "CAMBIO DE PROPIETARIO – PERSONA INDIVIDUAL") {
					$files = $this->intranet_model->get_solicitudes_mudanzas_files($mudanzas_info[0]['id']);
				?>
				<table class="table table-condensed">
					<tbody>
						<tr>
							<td>Carta del propietario autorizando el ingreso de inquilino, el documento debe indicar si hay cambios en la facturación.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file1']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Ficha de datos generales del nuevo propietario.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file2']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Formato de Nuevo Propietario (FNP) firmado por la empresa.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file3']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Copia de la escritura de compraventa.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file4']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Copia DPI de persona individual.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file5']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Copia de RTU.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file6']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Copia de póliza de Responsabilidad Civil.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file7']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
					</tbody>
              	</table>
				<?php
				}
				?>
				<?php
				if(trim($mudanzas_info[0]['tipo']) == "INGRESO DE INQUILINO/PROPIETARIO PERSONA INDIVIDUAL") {
					$files = $this->intranet_model->get_solicitudes_mudanzas_files($mudanzas_info[0]['id']);
					// echo "<pre>";
					// print_r($files);
				?>
				<table class="table table-condensed">
					<tbody>
						<tr>
							<td>Carta del propietario autorizando el ingreso de inquilino, el documento debe indicar si hay cambios en la facturación.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file1']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Ficha de datos generales de la empresa.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file2']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Formato de Nuevo Inquilino (FNI) firmado por la empresa arrendataria.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file3']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Copia de DPI persona individual.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file4']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Copia de RTU.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file5']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Copia de la escritura de arrendamiento.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file6']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Logo de la empresa en formato .jpg.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file7']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Copia de póliza de Responsabilidad Civil.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file8']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Completar formulario de Censo.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file9']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
					</tbody>
				</table>
				<?php
				}
				?>
				<?php
				if(trim($mudanzas_info[0]['tipo']) == "SALIDA DE INQUILINO") {
					$files = $this->intranet_model->get_solicitudes_mudanzas_files($mudanzas_info[0]['id']);
					// echo "<pre>";
					// print_r($files);
				?>
				<table class="table table-condensed">
					<tbody>
						<tr>
							<td>Carta del propietario autorizando la salida de inquilino, el documento debe indicar si hay cambios en la facturación.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file1']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Formato de Salida de Inquilino (FSI) firmado por el propietario de la oficina.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file2']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Solvencia de la cuota de mantenimiento emitida por el Departamento de Facturación y Cobros de Zona Pradera. (facturacionycobros@zonapradera.com).</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file3']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Listado de actualización de tarjetas.</td>
							<td><a href="<?= base_url('mudanzas-docs/' . $files[0]['file4']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
					</tbody>
				</table>
				<?php
				}
				?>
				<?php
				if($mudanzas_info[0]['razon']) {
				?>
				<hr>
				<h4 style="color: #A70000;">Razón por la que fue negada la solicitud</h4>
				<table class="table table-default table-responsive table-bordered">
					<tbody>
						<tr style="background-color: #FFBABA;">
							<td style="color: #A70000;"><?= $mudanzas_info[0]['razon'] ?></td>
						</tr>
					</tbody>
				</table>
				<?php
				}
				?>

				<?php
					// get logs
					$logs= $this
						->db
						->select('*')
						->from('logs')
						->where('idSolicitud', $mudanzas_info[0]['id'])
						->order_by('id', 'asc')
						->get();
					if($logs->num_rows() > 0) {
						$logs = $logs->result_array();
					}else{
						$logs = array();
					}
					?>

					<?php
					if($logs) {
					?>
					<hr>
					<h4>Historial</h4>
					<table class="table table-default table-striped table-responsive table-bordered">
						<tbody>
							<?php
							foreach ($logs as $l) {
								$date = new DateTime($l['fechaHora']);

								$formatter = new IntlDateFormatter(
									'es_ES', // Spanish locale
									IntlDateFormatter::FULL,
									IntlDateFormatter::SHORT
								);

								$laFecha = $formatter->format($date);
							?>
							<tr>
								<td style="padding: 4px;"><?= $laFecha . ' .::. ' . $l['log'] . ' .::. ' . $l['user'] ?></td>
							</tr>
							<?php
							}
							?>
						</tbody>
					</table>
					<?php
					}
					?>
				</table><!-- table-wrapper -->
			</div><!-- table-wrapper -->
		</div><!-- card -->
	</div><!-- col-6 -->
</div>
