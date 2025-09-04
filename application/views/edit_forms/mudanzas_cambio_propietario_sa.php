<form method="POST" class="cambioPropietario formE" action="<?= base_url('mudanzas/editar_mudanzas/' . $idsol . '/' . $tiposol) ?>" enctype="multipart/form-data">
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
				<?php
				$files = $this->intranet_model->get_solicitudes_mudanzas_files($mudanzas_info[0]['id']);
				?>
			<tbody>
				<tr>
					<td style="width: 30px; text-align: center;"><a href="<?= base_url('mudanzas-docs/' . $files[0]['file1']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
					<td>Carta del antiguo propietario informando la venta de la oficina, el documento debe indicar si hay cambios en la facturación. *</td>
					<td><input type="FILE" name="file1" class="form-control"></td>
				</tr>
				<tr>
					<td style="width: 30px; text-align: center;"><a href="<?= base_url('mudanzas-docs/' . $files[0]['file1']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
					<td>Ficha de datos generales del nuevo propietario. *</td>
					<td><input type="FILE" name="file2" class="form-control"></td>
				</tr>
				<tr>
					<td style="width: 30px; text-align: center;"><a href="<?= base_url('mudanzas-docs/' . $files[0]['file2']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
					<td>Formato de Nuevo Propietario (FNP) firmado por el representante legal. *</td>
					<td><input type="FILE" name="file3" class="form-control"></td>
				</tr>
				<tr>
					<td style="width: 30px; text-align: center;"><a href="<?= base_url('mudanzas-docs/' . $files[0]['file3']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
					<td>Copia de la escritura de compraventa. *</td>
					<td><input type="FILE" name="file4" class="form-control"></td>
				</tr>
				<tr>
					<td style="width: 30px; text-align: center;"><a href="<?= base_url('mudanzas-docs/' . $files[0]['file4']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
					<td>Copia de los nombramientos vigentes de la sociedad arrendataria o nueva adquiriente. *</td>
					<td><input type="FILE" name="file5" class="form-control"></td>
				</tr>
				<tr>
					<td style="width: 30px; text-align: center;"><a href="<?= base_url('mudanzas-docs/' . $files[0]['file6']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
					<td>Copia DPI representante legal. *</td>
					<td><input type="FILE" name="file6" class="form-control"></td>
				</tr>
				<tr>
					<td style="width: 30px; text-align: center;"><a href="<?= base_url('mudanzas-docs/' . $files[0]['file6']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
					<td>Copia de patente de comercio. *</td>
					<td><input type="FILE" name="file7" class="form-control"></td>
				</tr>
				<tr>
					<td style="width: 30px; text-align: center;"><a href="<?= base_url('mudanzas-docs/' . $files[0]['file7']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
					<td>Copia de RTU. *</td>
					<td><input type="FILE" name="file8" class="form-control"></td>
				</tr>
				<tr>
					<td style="width: 30px; text-align: center;"><a href="<?= base_url('mudanzas-docs/' . $files[0]['file8']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a></td>
					<td>Copia de póliza de Responsabilidad Civil. *</td>
					<td><input type="FILE" name="file9" class="form-control"></td>
				</tr>
			</tbody>
			</table>
		</div>
		</div>
		<div class="form-layout-footer">
			<button type="submit" style="cursor: pointer;" name="editar_cambio_propietario_sa" class="btn btn-info mg-r-5">Editar solicitud</button>
			<a href="<?= base_url('mudanzas') ?>" style="cursor: pointer;" class="btn btn-default mg-r-5 cancelarMudanza">Cancelar</a>
		</div><!-- form-layout-footer -->
	</div><!-- form-layout -->
</form>
