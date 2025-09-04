<div class="row row-sm mg-t-20">
	<div class="col-xl-12 mg-t-25 mg-xl-t-0">
		<div class="card pd-10 pd-sm-10 form-layout form-layout-5">
			<div class="table-wrapper">
				<?php
				$oficina = $this->intranet_model->get_oficina_single($remodelaciones_info[0]['id_oficina']);
				?>
				<h3 style="float: left;">REMODELACIONES <?= ' - ID Solicitud: ' . $remodelaciones_info[0]['id'] ?></h3>
				<?php
					if ($remodelaciones_info[0]['status_remodelacion'] == 0) {
						$estado = "PENDIENTE";
						$estadocolor = "#ffc14d";
					} elseif ($remodelaciones_info[0]['status_remodelacion'] == 1) {
						$estado = "APROBADO";
						$estadocolor = "#00b300";
					} elseif ($remodelaciones_info[0]['status_remodelacion'] == 2) {
						$estado = "DENEGADO";
						$estadocolor = "#ff0000";
					} elseif ($remodelaciones_info[0]['status_remodelacion'] == 3) {
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
                <table class="table table-default table-responsive table-bordered">
                    <tbody>
                        <tr>
                            <td style="font-weight: bold; background-color: #999a9b; color: #fff;">Torre remodelación</td>
                            <td><?= $remodelaciones_info[0]['torre'] ?></td>
                            <td style="font-weight: bold; background-color: #999a9b; color: #fff;">Oficina remodelación</td>
                            <td><?= $remodelaciones_info[0]['oficina'] ?></td>
                            <td style="font-weight: bold; background-color: #999a9b; color: #fff;">Fecha inicio</td>
                            <td><?= date('d-m-Y', strtotime($remodelaciones_info[0]['fechainicio'])) ?></td>
                            <td style="font-weight: bold; background-color: #999a9b; color: #fff;">Fecha fin</td>
                            <td><?= date('d-m-Y', strtotime($remodelaciones_info[0]['fechafin'])) ?></td>
                        </tr>
                    </tbody>
                </table>
				<table class="table table-condensed">
					<tbody>
						<tr>
							<td>Carta formal. Archivo PDF.</td>
							<td style="width: 35px; text-align: center;"><a href="<?= base_url('remodelaciones-docs/' . $remodelaciones_info[0]['file1']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Plano actual. Archivo PDF.</td>
							<td style="width: 35px; text-align: center;"><a href="<?= base_url('remodelaciones-docs/' . $remodelaciones_info[0]['file2']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<tr>
							<td>Plano propuesta de remodelación.</td>
							<td style="width: 35px; text-align: center;"><a href="<?= base_url('remodelaciones-docs/' . $remodelaciones_info[0]['file3']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
						</tr>
						<?php
						if(isset($remodelaciones_info[0]['file4'])) {
						?>
							<tr>
								<td>Cronograma de actividades.</td>
								<td style="width: 35px; text-align: center;"><a href="<?= base_url('remodelaciones-docs/' . $remodelaciones_info[0]['file4']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
							</tr>
						<?php
						}
						?>
						
					</tbody>
              	</table>
				<?php
				if($remodelaciones_info[0]['razon']) {
				?>
				<hr>
				<h4 style="color: #A70000;">Razón por la que fue negada la solicitud</h4>
				<table class="table table-default table-responsive table-bordered">
					<tbody>
						<tr style="background-color: #FFBABA;">
							<td style="color: #A70000;"><?= $remodelaciones_info[0]['razon'] ?></td>
						</tr>
					</tbody>
				</table>
				<?php
				}
				?>
			</div>
			<?php
					// get logs
					$logs= $this
						->db
						->select('*')
						->from('logs')
						->where('idSolicitud', $remodelaciones_info[0]['id'])
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
		</div><!-- card -->
	</div><!-- col-6 -->
</div>
