<div class="am-sideleft">
	<div class="tab-content">
		<div id="mainMenu" class="tab-pane active">
			<ul class="nav am-sideleft-menu">
				<li class="nav-item">
					<a href="<?= base_url('inicio') ?>" class="nav-link <?= ($title == 'Inicio') ? 'active' : '' ?>">
						<img src="<?= base_url('assets/svgicons/inicio.svg') ?>" class="menuicon">
						<span>Inicio</span>
					</a>
				</li><!-- nav-item -->
				<li class="nav-item">
					<a href="<?= base_url('empleos') ?>" class="nav-link <?= ($title == 'Empleos') ? 'active' : '' ?>">
						<img src="<?= base_url('assets/svgicons/empleos.svg') ?>" class="menuicon">
						<span>Empleos</span>
					</a>
				</li><!-- nav-item -->
				<li class="nav-item">
					<a href="<?= base_url('elevadores') ?>" class="nav-link <?= ($title == 'Elevadores') ? 'active' : '' ?>">
						<img src="<?= base_url('assets/svgicons/elevadores.svg') ?>" class="menuicon">
						<span>Elevadores</span>
					</a>
				</li><!-- nav-item -->
				<?php
				if ($_SESSION['type'] == 'admin') {
				?>
					<li class="nav-item">
						<a href="" class="nav-link with-sub <?= (($title == "Usuarios intranet") || ($title == "Usuarios super admin")) ? 'active' : '' ?>">
							<img src="<?= base_url('assets/svgicons/usuarios.svg') ?>" class="menuicon">
							<span>Usuarios</span>
						</a>
						<ul class="nav-sub">
							<li class="nav-item"><a href="<?= base_url('usuarios/intranet') ?>" class="nav-link">Usuarios intranet</a></li>
							<li class="nav-item"><a href="<?= base_url('usuarios/superadmin') ?>" class="nav-link">Super admin</a></li>
						</ul>
					</li><!-- nav-item -->
				<?php
				}
				?>
				<li class="nav-item">
					<a href="<?= base_url('mudanzas') ?>" class="nav-link <?= ($title == 'Ingreso / Salida') ? 'active' : '' ?>">
						<img src="<?= base_url('assets/svgicons/mudanzas.svg') ?>" class="menuicon">
						<span>Ingreso / Salida</span>
					</a>
				</li><!-- nav-item -->
				<li class="nav-item">
					<a href="<?= base_url('remodelaciones') ?>" class="nav-link <?= ($title == 'Remodelaciones') ? 'active' : '' ?>">
						<img src="<?= base_url('assets/svgicons/remodelaciones.svg') ?>" class="menuicon">
						<span>Remodelaciones</span>
					</a>
				</li><!-- nav-item -->
				<li class="nav-item">
					<a href="<?= base_url('archivos') ?>" class="nav-link <?= ($title == 'Archivos PDF') ? 'active' : '' ?>">
						<img src="<?= base_url('assets/svgicons/pdf.svg') ?>" class="menuicon">
						<span>Archivos PDF</span>
					</a>
				</li><!-- nav-item -->
				<li class="nav-item">
					<a href="<?= base_url('noticias') ?>" class="nav-link <?= ($title == 'Noticias') ? 'active' : '' ?>">
						<img src="<?= base_url('assets/svgicons/noticias.svg') ?>" class="menuicon">
						<span>Noticias</span>
					</a>
				</li><!-- nav-item -->
				<li class="nav-item">
					<a href="<?= base_url('inmuebles') ?>" class="nav-link <?= ($title == 'Inmuebles') ? 'active' : '' ?>">
						<img src="<?= base_url('assets/svgicons/inmuebles.svg') ?>" class="menuicon">
						<span>Inmuebles</span>
					</a>
				</li><!-- nav-item -->
				<li class="nav-item">
					<a href="<?= base_url('contrasena') ?>" class="nav-link <?= ($title == 'Contraseña') ? 'active' : '' ?>">
						<img src="<?= base_url('assets/svgicons/password.svg') ?>" class="menuicon">
						<span>Cambiar Contraseña</span>
					</a>
				</li><!-- nav-item -->
				<li class="nav-item">
					<a href="#" class="nav-link" onclick="confirmLogout()">
						<img src="<?= base_url('assets/svgicons/cerrar.svg') ?>" class="menuicon">
						<span>Cerrar sesión</span>
					</a>
				</li><!-- nav-item -->
			</ul>
		</div><!-- #mainMenu -->
	</div><!-- tab-content -->
</div><!-- am-sideleft -->