<form method="POST" class="salidaInquilinoPropietario formE" action="<?= base_url('mudanzas/editar_mudanzas/' . $idsol . '/' . $tiposol) ?>" enctype="multipart/form-data">
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
				<?php
				$files = $this->intranet_model->get_solicitudes_mudanzas_files($mudanzas_info[0]['id']);
				?>
			<tbody>
				<tr>
					<td style="width: 30px; text-align: center;"><a href="<?= base_url('mudanzas-docs/' . $files[0]['file1']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
					<td>Carta del propietario autorizando la salida de inquilino, el documento debe indicar si hay cambios en la facturación. *</td>
					<td><input type="FILE" name="file1" class="form-control"></td>
				</tr>
				<tr>
					<td style="width: 30px; text-align: center;"><a href="<?= base_url('mudanzas-docs/' . $files[0]['file2']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
					<td>Formato de Salida de Inquilino (FSI) firmado por el propietario de la oficina. *</td>
					<td><input type="FILE" name="file2" class="form-control"></td>
				</tr>
				<tr>
					<td style="width: 30px; text-align: center;"><a href="<?= base_url('mudanzas-docs/' . $files[0]['file3']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
					<td>Solvencia de la cuota de mantenimiento emitida por el Departamento de Facturación y Cobros de Zona Pradera. (facturacionycobros@zonapradera.com). *</td>
					<td><input type="FILE" name="file3" class="form-control"></td>
				</tr>
				<tr>
					<td style="width: 30px; text-align: center;"><a href="<?= base_url('mudanzas-docs/' . $files[0]['file4']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
					<td>Listado de actualización de tarjetas. *</td>
					<td><input type="FILE" name="file4" class="form-control"></td>
				</tr>
			</tbody>
			</table>
		</div>
		</div>
		<div class="form-layout-footer">
			<button type="submit" style="cursor: pointer;" name="editar_salida_inquilino" class="btn btn-info mg-r-5">Editar solicitud</button>
			<a href="<?= base_url('mudanzas') ?>" style="cursor: pointer;" class="btn btn-default mg-r-5 cancelarMudanza">Cancelar</a>
		</div><!-- form-layout-footer -->
	</div><!-- form-layout -->
</form>
