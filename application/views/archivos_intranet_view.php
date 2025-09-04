<div class="row row-sm mg-t-20">
  <div class="col-xl-10 mg-t-25 mg-xl-t-0">
    <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Archivos</h6>
      <p>Descargue documentos, manuales, formularios y plantillas para realizar gestiones dentro del Portal Privado, utilice el buscador para ubicar lo que necesita con mayor rapidez.</p>
      <div class="table-wrapper">
        <table id="" class="table table-condensed table-bordered display table-dark responsive nowrap">
          <thead>
            <tr>
              <th>Título</th>
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
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->
  </div><!-- col-6 -->
</div>