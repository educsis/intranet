<style>
  table {
    font-size: 11px;
  }

  table.dataTable tbody th,
  table.dataTable tbody td {
    padding: 5px;
  }

  .vistabtn{
    border: 1px solid #2D3A50;
    padding: 3px 6px;
    border-radius: 4px;
    color: #2D3A50;
  }

  .vistabtn:hover{
    border: 1px solid #2D3A50;
    background-color: #2D3A50;
    color: #fff;
  }

  .vistabtn .disabled{
    border: 1px solid #f2f2f2;
    color: #f2f2f2;
  }

	/* HTML: <div class="loader"></div> */
	.loader {
		width: 60px;
		height: 25px;
		border: 2px solid;
		box-sizing: border-box;
		border-radius: 50%;
		display: grid;
		animation: l2 2s infinite linear;
	}
	.loader:before,
	.loader:after {
		content: "";
		grid-area: 1/1;
		border: inherit;
		border-radius: 50%;
		animation: inherit;
		animation-duration: 3s;
	}
	.loader:after {
		--s:-1;
	}
	@keyframes l2 {
		100% {transform:rotate(calc(var(--s,1)*1turn))}
	}
</style>
<div class="row row-sm mg-t-20">
  <div class="col-xl-12 mg-t-25 mg-xl-t-0">
    <div class="card pd-10 pd-sm-10 form-layout form-layout-5">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Seleccionar una opción</h6>
      <div class="form-group">
        <!-- <a href="javascript:void(0);" class="btn btn-default vistabtn disabled" data-tipobtn="0">Ver todo</a> -->
        <a href="<?= base_url('elevadores') ?>" class="btn btn-default vistabtn <?= ($tipostatus == 0)?'disabled':'' ?>" data-tipobtn="1">Solicitudes pendientes</a>
        <a href="<?= base_url('elevadores?stat=1') ?>" class="btn btn-default vistabtn <?= ($tipostatus == 1)?'disabled':'' ?>" data-tipobtn="2">Solicitudes aprobadas</a>
        <a href="<?= base_url('elevadores?stat=2') ?>" class="btn btn-default vistabtn <?= ($tipostatus == 2)?'disabled':'' ?>" data-tipobtn="3">Solicitudes denegadas</a>
        <a href="<?= base_url('elevadores?stat=3') ?>" class="btn btn-default vistabtn <?= ($tipostatus == 3)?'disabled':'' ?>" data-tipobtn="4">Solicitudes completadas</a>
      </div>
    </div><!-- card -->
  </div><!-- col-6 -->
</div>

<?= $this->load->view($vista,'', TRUE) ?>

<div id="explicacionmodalElevador" class="modal fade">
  <div class="modal-dialog modal-md" role="document" style="width: 500px !important;">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold tituloModal"></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?= base_url('elevadores/estatus_change_elevadores') ?>">
        <input type="hidden" class="ids" name="ids">
        <div class="modal-body pd-20">
          <div class="row">
            <div class="col-md-12 form-group">
              <label>Razón</label>
              <textarea class="form-control larazon" name="razon" required="true" autcomplete="off"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" name="negar_elevador" class="btn btn-info pd-x-20 submitbtn">Enviar</button>
          <button type="button" class=  "closerazon btn btn-secondary pd-x-20" data-dismiss="modal">Cerrar</button>
        </div>
      </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->
