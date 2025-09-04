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
			$this->load->view('edit_forms/elevadores_internos');
		} elseif($tiposol == 2) {
			$this->load->view('edit_forms/elevadores_pequeno');
	  	} elseif($tiposol == 3) {
			$this->load->view('edit_forms/elevadores_grande');
	  } elseif($tiposol == 4) {
			// $this->load->view('edit_forms/elevadores_mudanza');
			$this->load->view('edit_forms/elevadores_grande');
	  }
	  ?>
    </div>
  </div><!-- col-6 -->
</div><!-- row -->
<script src="<?= base_url('assets/lib/jquery/jquery.js') ?>"></script>
<script>
	$('.add_less_listado').on("click", function() {
		var html = $(this).parent().parent();
		html.remove();
	});
</script>
