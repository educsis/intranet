<form class="grandeForm formE" method="POST" action="<?= base_url('elevadores/editar_elevador/' . $idsol . '/' . $tiposol) ?>">
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
			<select name="tipo" class="form-control tiposel">
				<option value="0" <?= ($elevador_info[0]['tipo'] == '')?'selected = "selected"':'' ?>>Selecciona una opción</option>
				<option value="propietario" <?= ($elevador_info[0]['tipo'] == 'propietario')?'selected = "selected"':'' ?>>Propietario</option>
				<option value="inquilino" <?= ($elevador_info[0]['tipo'] == 'inquilino')?'selected = "selected"':'' ?>>Inquilino</option>
			</select>
		</div>
		<div class="col-md-3 form-group">
			<label>* Fecha que requiere elevador</label>
			<div class="input-group">
			<span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
			<input type="date" name="fecha" class="form-control" value="<?= $elevador_info[0]['fecha'] ?>" required="true" autocomplete="off">
			</div>
		</div>
		<div class="col-md-3 form-group">
			<label>* Horario Solicitado</label>
			<select name="horario" class="form-control">
				<option value="0">Selecciona una opción</option>
				<option value="Lunes a viernes a partir de las 19:00 horas" <?= ($elevador_info[0]['horario'] == 'Lunes a viernes a partir de las 19:00 horas')?'selected = "selected"':'' ?>>Lunes a viernes a partir de las 19:00 horas</option>
				<option value="Sábado a partir de 14:00 horas" <?= ($elevador_info[0]['horario'] == 'Sábado a partir de 14:00 horas')?'selected = "selected"':'' ?>>Sábado a partir de 14:00 horas</option>
				<option value="Domingo a cualquier hora" <?= ($elevador_info[0]['horario'] == 'Domingo a cualquier hora')?'selected = "selected"':'' ?>>Domingo a cualquier hora</option>
			</select>
		</div>
		<div class="col-md-3 form-group">
			<label>* Tipo Requerimiento</label>
			<select name="requerimiento" class="form-control">
			<option value="0">Selecciona una opción</option>
			<option value="req1" <?= ($elevador_info[0]['requerimiento'] == 'req1')?'selected = "selected"':'' ?>>Ingreso</option>
			<option value="req2" <?= ($elevador_info[0]['requerimiento'] == 'req2')?'selected = "selected"':'' ?>>Retiro</option>
			<option value="req3" <?= ($elevador_info[0]['requerimiento'] == 'req3')?'selected = "selected"':'' ?>>Traslado dentro de Zona Pradera</option>
			</select>
		</div>
		</div>
		<div class="row">
			<div class="col-md-12 form-group">
				<label>* Tipo de Carga</label>
				<?php
			$cargaArray = array_map('trim', explode(',', $elevador_info[0]['carga']));
			?>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="form-check col-md-1">
					<input class="form-check-input" type="checkbox" name="carga[]" value="mobiliario" id="carga1" <?= (in_array('mobiliario', $cargaArray))?'checked="true"':'' ?>>
					<label class="form-check-label" for="carga1" style="padding-left: 0px;">
					Mobiliario
					</label>
				</div>
				<div class="form-check col-md-1">
					<input class="form-check-input" type="checkbox" name="carga[]" value="equipo" id="carga2" <?= (in_array('equipo', $cargaArray))?'checked="true"':'' ?>>
					<label class="form-check-label" for="carga2" style="padding-left: 0px;">
					Equipo
					</label>
				</div>
				<div class="form-check col-md-1">
					<input class="form-check-input" type="checkbox" name="carga[]" value="productos" id="carga3" <?= (in_array('productos', $cargaArray))?'checked="true"':'' ?>>
					<label class="form-check-label" for="carga3" style="padding-left: 0px;">
					Productos
					</label>
				</div>
				<div class="form-check col-md-1">
					<input class="form-check-input" type="checkbox" name="carga[]" value="material" id="carga4" <?= (in_array('material', $cargaArray))?'checked="true"':'' ?>>
					<label class="form-check-label" for="carga4" style="padding-left: 0px;">
					Material
					</label>
				</div>
				<div class="form-check col-md-1">
					<input class="form-check-input" type="checkbox" name="carga[]" value="desechos" id="carga5" <?= (in_array('desechos', $cargaArray))?'checked="true"':'' ?>>
					<label class="form-check-label" for="carga5" style="padding-left: 0px;">
					Desechos
					</label>
				</div>
				<div class="form-check col-md-1">
					<input class="form-check-input" type="checkbox" name="carga[]" value="otros" id="carga6" <?= (in_array('otros', $cargaArray))?'checked="true"':'' ?>>
					<label class="form-check-label" for="carga6" style="padding-left: 0px;">
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
			<input type="text" class="form-control" name="motivo" required="true" autocomplete="off" value="<?= $elevador_info[0]['motivo'] ?>">
		</div>
		</div>
		<h5>Descripción de la carga</h5>
		<p>Especifique si hay un equipo y/o mobiliario que sobrepase peso máximo o dimensiones de elevador de carga. Consulte las medidas y dimensiones del elevador de carga en la sección de Documentos PDF (Información Importante).</p>
		<div class="row">
		<div class="col-md-9 form-group">
			<label>* Detalle</label>
			<textarea class="form-control" name="detalle" required="true"><?= $elevador_info[0]['detalle'] ?></textarea>
		</div>
		<div class="col-md-3 form-group">
			<label>* Archivo de detalle</label>
			<input type="file" name="archivo" class="form-control" autocomplete="off">
		</div>
		</div>
		<hr style="margin-top: 5px; margin-bottom: 10px;">
		<h5>Datos del proveedor y/o contratista</h5>
		<div class="row">
		<div class="col-md-8 form-group">
			<label>* Nombre Empresa</label>
			<input type="text" name="empresa_proveedor" class="form-control" required="true" autocomplete="off" value="<?=$elevador_info[0]['empresa_proveedor'] ?>">
		</div>
		</div>
		<h5>Datos Vehículo</h5>
		<div class="row">
			<div class="col-md-4 form-group">
				<label>* Marca</label>
				<input type="text" name="marca1" class="form-control" required="true" autocomplete="off" value="<?= $elevador_info[0]['marca1'] ?>">
			</div>
			<div class="col-md-4 form-group">
				<label>* Color</label>
				<input type="text" name="color1" class="form-control" required="true" autocomplete="off" value = "<?=$elevador_info[0]['color1']?>">
			</div>
			<div class="col-md-4 form-group">
				<label>* Placa</label>
				<input type="text" name="placa1" class="form-control" required="true" autocomplete="off" value = "<?= $elevador_info[0]['placa1']?>">
			</div>
			</div>
			<div class="row">
			<div class="col-md-4 form-group">
				<label>Marca</label>
				<input type="text" name="marca2" class="form-control" autocomplete="off" value = "<?= $elevador_info[0]['marca2'] ?>">
			</div>
			<div class="col-md-4 form-group">
				<label>Color</label>
				<input type="text" name="color2" class="form-control" autocomplete="off" value = "<?= $elevador_info[0]['color2'] ?>">
			</div>
			<div class="col-md-4 form-group">
				<label>Placa</label>
				<input type="text" name="placa2" class="form-control" autocomplete="off" value = "<?= $elevador_info[0]['placa2']?>">
			</div>
			</div>
			<div class="row">
			<div class="col-md-4 form-group">
				<label>Marca</label>
				<input type="text" name="marca3" class="form-control" autocomplete="off" value = "<?= $elevador_info[0]['marca3'] ?>">
			</div>
			<div class="col-md-4 form-group">
				<label>Color</label>
				<input type="text" name="color3" class="form-control" autocomplete="off" value = "<?= $elevador_info[0]['color3'] ?>">
			</div>
			<div class="col-md-4 form-group">
				<label>Placa</label>
				<input type="text" name="placa3" class="form-control" autocomplete="off" value = "<?= $elevador_info[0]['placa3'] ?>">
			</div>
		</div>
		<hr>
		<h5>Listado de Personal</h5>
		<div class="wrapper-listado">
		<?php
		$personalName = array_map('trim', explode(',', $elevador_info[0]['personal_nombre']));
		$personalDPI = array_map('trim', explode(',', $elevador_info[0]['personal_dpi']));
		$botones = 1;
		foreach($personalName as $k => $name) {
		?>
		<div class="row">
			<div class="col-md-9 form-group">
			<label>* Nombre <?= $k ?></label>
			<input name="personal_name[]" class="form-control" required="true" autocomplete="off" value="<?= $name ?>">
			</div>
			<div class="col-md-2 form-group">
			<label>* DPI</label>
			<input name="personal_dpi[]" class="form-control" required="true" autocomplete="off" value= "<?= $personalDPI[$k] ?>">
			</div>
			<div class="col-md-1 form-group">
			<?php
			if($botones == 1) {
			?>
			<a href="javascript:void(0);" class="btn btn-success add_more_listado" style="margin-top:30px;"><i class="fa fa-plus-circle"></i></a>
			<?php
			} else {
			?>
			<a href="javascript:void(0);" class="btn btn-danger add_less_listado" style="margin-top:30px;"><i class="fa fa-minus-circle"></i></a>
			<?php
			}
			?>
			</div>
		</div>
		<?php
			$botones++;
		}
		?>
		</div>
		<hr style="margin-top: 5px; margin-bottom: 10px;">
		<h5>Datos de la persona que autoriza</h5>
		<div class="row">
		<div class="col-md-4 form-group">
			<label>* Nombre</label>
			<input name="autorizanombre" class="form-control" required="true" autocomplete="off" value="<?= $elevador_info[0]['autorizanombre'] ?>">
		</div>
		<div class="col-md-3 form-group">
			<label>* Cargo</label>
			<input name="autorizacargo" class="form-control" required="true" autocomplete="off" value="<?= $elevador_info[0]['autorizacargo'] ?>">
		</div>
		<div class="col-md-2 form-group">
			<label>* Teléfono</label>
			<input name="autorizatelefono" class="form-control" required="true" autocomplete="off" value="<?= $elevador_info[0]['autorizatelefono'] ?>">
		</div>
		<div class="col-md-3 form-group">
			<label>* Email</label>
			<input name="autorizaemail" type="email" class="form-control" required="true" autocomplete="off" value="<?= $elevador_info[0]['autorizaemail'] ?>">
		</div>
		</div>
		<div class="form-layout-footer">
			<button type="submit" style="cursor: pointer;" name="editarElevadoresGrande" class="btn btn-info mg-r-5">Editar solicitud</button>
			<a href="<?= base_url('elevadores') ?>" style="cursor: pointer;" class="btn btn-default mg-r-5 cancelarElevador">Cancelar</a>
		</div><!-- form-layout-footer -->
	</div><!-- form-layout -->
	</form>
