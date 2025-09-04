<div class="row row-sm mg-t-20">
  <div class="col-xl-12">
    <?php
    if ($msg == 'success') {
    ?>
      <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="d-flex align-items-center justify-content-start">
          <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
          <span>Su solicitud ha sido enviada exitosamente. Está pendiente de aprobación.</span>
        </div><!-- d-flex -->
      </div><!-- alert -->
    <?php
    }
    ?>
    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Archivos PDF</h6>
      <form method="POST" action="<?= base_url('archivos') ?>" enctype="multipart/form-data">
        <div class="form">
          <div class="row">
            <div class="col-lg-5">
              <div class="form-group">
                <label class="form-control-label">Título: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="titulo" value="" placeholder="Ingresar título de solicitud" required="true" autocomplete="off">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Archivo PDF (Máximo 24MB): <span class="tx-danger">*</span></label>
                <input onchange="ValidateSize(this, 24)" type="file" class="form-control" name="archivo">
              </div>
            </div><!-- col-4 -->
          </div>
          <div class="form-layout-footer">
            <button type="submit" style="cursor: pointer;" name="enviar" class="btn btn-info mg-r-5">Guardar archivo PDF</button>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
      </form>
    </div>
  </div><!-- col-6 -->
</div><!-- row -->

<div class="row row-sm mg-t-20">
  <div class="col-xl-12 mg-t-25 mg-xl-t-0">
    <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Archivos</h6>

      <div class="table-wrapper">
        <table class="table table-condensed table-bordered display table-dark responsive nowrap">
          <thead>
            <tr>
              <th>Título</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($archivos as $a) {
              $fecha = date('d-m-Y', strtotime($a['fecha']));
              $titulo = $a['titulo'];
            ?>
              <tr>
                <td style="padding-top: 15px;"><?= $titulo ?></td>
                <td style="width: 30px; text-align: center;">
                  <a href="<?= base_url('pdf/' . $a['archivo']) ?>" target="_blank"><img src="<?= base_url('assets/svgicons/link.svg') ?>" class="menuicon"></a>
                </td>
                <td style="width: 70px; text-align: center;">
                  <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="confirmDeleteArchivo('<?= $a['id']; ?>')"><i class="fa fa-close"></i></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->
  </div><!-- col-6 -->
</div>