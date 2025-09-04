<div class="row row-sm mg-t-20">
	<div class="col-xl-12 mg-t-25 mg-xl-t-0">
		<div class="card pd-10 pd-sm-10 form-layout form-layout-5">
			<div class="table-wrapper">
				<?php
				$oficina = $this->intranet_model->get_oficina_single($elevador_info[0]['id_oficina']);
				?>
				<h3 style="float: left;"><?= $elevador_info[0]['form'] . ' - ID Solicitud: ' . $elevador_info[0]['id'] ?></h3>
				<?php
					if ($elevador_info[0]['status_elevador'] == 0) {
						$estado = "PENDIENTE";
						$estadocolor = "#ffc14d";
					} elseif ($elevador_info[0]['status_elevador'] == 1) {
						$estado = "APROBADO";
						$estadocolor = "#00b300";
					} elseif ($elevador_info[0]['status_elevador'] == 2) {
						$estado = "DENEGADO";
						$estadocolor = "#ff0000";
					} elseif ($elevador_info[0]['status_elevador'] == 3) {
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
					<table class="table table-default table-responsive table-bordered">
						<tbody>
							<tr>
								<td style="font-weight: bold; background-color: #999a9b; color: #fff;">Propietario - Inquilino</td>
								<td><?= $elevador_info[0]['tipo'] ?></td>
								<td style="font-weight: bold; background-color: #999a9b; color: #fff;">Fecha requerimiento</td>
								<td><?= date('d-m-Y', strtotime($elevador_info[0]['fecha'])) ?></td>
								<td style="font-weight: bold; background-color: #999a9b; color: #fff;">Horario Solicitado</td>
								<td><?= $elevador_info[0]['horario'] ?></td>
								<td style="font-weight: bold; background-color: #999a9b; color: #fff;">Tipo Requerimiento</td>
								<td><?= $elevador_info[0]['requerimiento'] ?></td>
							</tr>
						</tbody>
					</table>
					<table class="table table-default table-responsive table-bordered">
						<tbody>
							<tr>
								<td style="font-weight: bold; background-color: #999a9b; color: #fff;">Tipo de Carga</td>
								<td><?= $elevador_info[0]['carga'] ?></td>
							</tr>
						</tbody>
					</table>
					<h4>Descripción de la carga</h4>
					<table class="table table-default table-responsive table-bordered">
						<tbody>
							<tr>
								<td style="font-weight: bold; background-color: #999a9b; color: #fff; width: 250px;">Motivo de retiro, ingreso o traslado</td>
								<td><?= $elevador_info[0]['motivo'] ?></td>
							</tr>
							<tr>
								<td style="font-weight: bold; background-color: #999a9b; color: #fff; width: 250px;">Detalle</td>
								<td><?= $elevador_info[0]['detalle'] ?></td>
							</tr>
						</tbody>
					</table>
					<h4>Datos del proveedor y/o contratista</h4>
					<table class="table table-default table-responsive table-bordered">
						<tbody>
							<tr>
								<td style="font-weight: bold; background-color: #999a9b; color: #fff; width: 150px;">Nombre Empresa</td>
								<td><?= $elevador_info[0]['empresa_proveedor'] ?></td>
							</tr>
						</tbody>
					</table>
					<h4>Datos Vehículo</h4>
					<table class="table table-default table-responsive table-bordered">
						<tbody>
							<?php
							if ($elevador_info[0]['marca1']) {
							?>
								<tr>
									<td style="font-weight: bold; background-color: #999a9b; color: #fff; width: 100px;">Marca 1</td>
									<td><?= $elevador_info[0]['marca1'] ?></td>
									<td style="font-weight: bold; background-color: #999a9b; color: #fff; width: 100px;">Color 1</td>
									<td><?= $elevador_info[0]['color1'] ?></td>
									<td style="font-weight: bold; background-color: #999a9b; color: #fff; width: 100px;">Placa 1</td>
									<td><?= $elevador_info[0]['placa1'] ?></td>
								</tr>
							<?php
							}
							?>
							<?php
							if ($elevador_info[0]['marca2']) {
							?>
								<tr>
									<td style="font-weight: bold; background-color: #999a9b; color: #fff; width: 100px;">Marca 2</td>
									<td><?= $elevador_info[0]['marca2'] ?></td>
									<td style="font-weight: bold; background-color: #999a9b; color: #fff; width: 100px;">Color 2</td>
									<td><?= $elevador_info[0]['color2'] ?></td>
									<td style="font-weight: bold; background-color: #999a9b; color: #fff; width: 100px;">Placa 2</td>
									<td><?= $elevador_info[0]['placa2'] ?></td>
								</tr>
							<?php
							}
							?>
							<?php
							if ($elevador_info[0]['marca3']) {
							?>
								<tr>
									<td style="font-weight: bold; background-color: #999a9b; color: #fff; width: 100px;">Marca 3</td>
									<td><?= $elevador_info[0]['marca3'] ?></td>
									<td style="font-weight: bold; background-color: #999a9b; color: #fff; width: 100px;">Color 3</td>
									<td><?= $elevador_info[0]['color3'] ?></td>
									<td style="font-weight: bold; background-color: #999a9b; color: #fff; width: 100px;">Placa 3</td>
									<td><?= $elevador_info[0]['placa3'] ?></td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
					<h4>Listado de Personal</h4>
					<table class="table table-default table-responsive table-bordered">
						<tbody>
							<?php
							$personalNameArray = explode(',', $elevador_info[0]['personal_nombre']);
							$personalDPIArray = explode(',', $elevador_info[0]['personal_dpi']);
							$key = 0;
							?>
							<?php
							foreach ($personalNameArray as $name) {
							?>
								<tr>
									<td style="font-weight: bold; background-color: #999a9b; color: #fff; width: 100px;">Nombre</td>
									<td><?= $name ?></td>
									<td style="font-weight: bold; background-color: #999a9b; color: #fff; width: 80px;">DPI</td>
									<td><?= @$personalDPIArray[$key] ?></td>
								</tr>
							<?php
								$key += 1;
							}
							?>
						</tbody>
					</table>
					<h4>Datos de la persona que autoriza</h4>
					<table class="table table-default table-responsive table-bordered">
						<tbody>
							<tr>
								<td style="font-weight: bold; background-color: #999a9b; color: #fff; width: 100px;">Nombre</td>
								<td><?= $elevador_info[0]['autorizanombre'] ?></td>
								<td style="font-weight: bold; background-color: #999a9b; color: #fff; width: 100px;">Cargo</td>
								<td><?= $elevador_info[0]['autorizacargo'] ?></td>
								<td style="font-weight: bold; background-color: #999a9b; color: #fff; width: 100px;">Teléfono</td>
								<td><?= $elevador_info[0]['autorizatelefono'] ?></td>
								<td style="font-weight: bold; background-color: #999a9b; color: #fff; width: 100px;">Email</td>
								<td><?= $elevador_info[0]['autorizaemail'] ?></td>
							</tr>
						</tbody>
					</table>
					<?php
					if($elevador_info[0]['razon']) {
					?>
					<hr>
					<h4 style="color: #A70000;">Razón por la que fue negada la solicitud</h4>
					<table class="table table-default table-responsive table-bordered">
						<tbody>
							<tr style="background-color: #FFBABA;">
								<td style="color: #A70000;"><?= $elevador_info[0]['razon'] ?></td>
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
						->where('idSolicitud', $elevador_info[0]['id'])
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
				</table><!-- table -->
			</div><!-- table-wrapper -->
		</div><!-- card -->
	</div><!-- col-6 -->
</div>
