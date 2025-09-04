<style>
  label {
    font-weight: bold;
  }
</style>
<div class="row row-sm mg-t-20">
  <div class="col-xl-12">
    <div class="card pd-20 pd-sm-40">
      <!-- <h3>Solicitud de elevador</h3>
      <hr> -->
	  <?php
		if($tiposol == 1) {
			$this->load->view('edit_forms/mudanzas_ingreso_inquilinos_propietario_sa');
		} elseif($tiposol == 2) {
			$this->load->view('edit_forms/mudanzas_ingreso_inquilinos_propietario_pi');
	  	} elseif($tiposol == 3) {
			$this->load->view('edit_forms/mudanzas_salida_inquilino');
		} elseif($tiposol == 4) {
				$this->load->view('edit_forms/mudanzas_cambio_propietario_sa');
		} elseif($tiposol == 5) {
				$this->load->view('edit_forms/mudanzas_cambio_individual');
		}
	  ?>
    </div>
  </div><!-- col-6 -->
</div><!-- row -->
